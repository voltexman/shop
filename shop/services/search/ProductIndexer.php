<?php

namespace shop\services\search;

use Elasticsearch\Client;
use shop\entities\shop\product\Product;
use shop\entities\shop\product\Value;
use shop\repositories\shop\CategoryRepository;
use yii\helpers\ArrayHelper;


class ProductIndexer
{
    private $client;
    private $categoryRepository;

    public function __construct(Client $client, CategoryRepository $categoryRepository)
    {
        $this->client = $client;
        $this->categoryRepository = $categoryRepository;
    }

    public function clear(): void
    {
        $this->client->indices()->delete([
            'index' => 'shop'
        ]);
    }

    public function createMapping() :void
    {
        $this->client->indices()->create([
            'index' => 'shop',
            'body' => [
                'settings' => [
                    'analysis' => [
                        'filter' => [
                            'autocomplete_filter' => [
                                'type' => 'edge_ngram',
                                'min_gram' => '1',
                                'max_gram' => '20',
                            ],
                        ],
                        'analyzer' => [
                            'autocomplete' => [
                                'type' => 'custom',
                                'tokenizer' => 'standard',
                                'filter' => [
                                    'lowercase',
                                    'autocomplete_filter',
                                ],
                            ],
                        ],
                    ],
                ],
                'mappings' => [
                    'products' => [
                        '_source' => [
                            'enabled' => true,
                        ],
                        'properties' => [
                            'id' => [
                                'type' => 'integer',
                            ],
                            'name' => [
                                'type' => 'text',
                                'analyzer' => 'autocomplete',
                                'fields' => [
                                    'raw' =>  [
                                        'type' => 'keyword',
                                    ],
                                ],
                            ],
                            'code' => [
                                'type' => 'text',
                                'analyzer' => 'autocomplete',
                                'fields' => [
                                    'raw' =>  [
                                        'type' => 'keyword',
                                    ],
                                ],
                            ],
                            'price' => [
                                'type' => 'integer',
                            ],
                            'rating' => [
                                'type' => 'float',
                            ],
                            'brand' => [
                                'type' => 'integer',
                            ],
                            'label' => [
                                'type' => 'integer',
                            ],
                            'categories' => [
                                'type' => 'integer',
                            ],
                            'values' => [
                                'type' => 'nested',
                                'properties' => [
                                    'characteristic' => [
                                        'type' => 'integer',
                                    ],
                                    'value_string' => [
                                        'type' => 'keyword',
                                    ],
                                    'value_int' => [
                                        'type' => 'integer',
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function index(Product $product): void
    {
        $this->client->index([
            'index' => 'shop',
            'type' => 'products',
            'id' => $product->id,
            'body' => [
                'id' => $product->id,
                'name' => $product->name,
                'code' => $product->code,
                'price' => $product->price_new,
                'rating' => $product->rating ?: 0,
                'brand' => $product->brand_id,
                'label' => $product->label,
                'categories' => ArrayHelper::merge(
                    [$product->category->id],
                    ArrayHelper::getColumn($product->category->parents, 'id')
                ),
                'values' => array_map(function (Value $value) {
                    return [
                        'characteristic' => $value->characteristic_id,
                        'value_string' => (string)$value->value,
                        'value_int' => (int)$value->value,
                    ];
                }, $product->values),
            ],
        ]);
    }

    public function remove(Product $product): void
    {
        $this->client->delete([
            'index' => 'shop',
            'type' => 'products',
            'id' => $product->id,
        ]);
    }
}