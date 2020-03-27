<?php

namespace shop\readModels\shop;

use Elasticsearch\Client;
use shop\entities\shop\Brand;
use shop\entities\shop\Category;
use shop\entities\shop\product\Product;
use shop\entities\shop\product\Review;
use shop\forms\shop\search\CatalogForm;
use shop\forms\shop\search\SearchForm;
use shop\forms\shop\search\ValueForm;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;
use yii\data\Pagination;
use yii\data\Sort;
use yii\db\ActiveQuery;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class ProductReadRepository
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function count(): int
    {
        return Product::find()->active()->count();
    }

    public function getAllByRange(int $offset, int $limit): array
    {
        return Product::find()->alias('p')->active('p')->orderBy(['id' => SORT_ASC])->limit($limit)->offset($offset)->all();
    }

    public function getMaxPrice() :string
    {
        /**
         * @var $product Product
         */
        $product = Product::find()->active()->orderBy(['price_new' => SORT_DESC])->one();
        if (!$product){
            return 10000;
        }
        return $product->price_new;
    }


    public function getReviewByProduct($productId, $limit): array
    {
        return Review::find()->where(['product_id' => $productId])->andWhere(['active' => true])->limit($limit)->orderBy(['id' => SORT_DESC])->all();
    }

    /**
     * @return iterable|Product[]
     */

    public function getAllIterator(): iterable
    {
        return Product::find()->alias('p')->active('p')->with('mainPhoto', 'brand')->each();
    }

    public function getAll(): DataProviderInterface
    {
        $query = Product::find()->alias('p')->active('p')->with('mainPhoto');
        return $this->getProvider($query);
    }

    public function getAllByCategory(Category $category): DataProviderInterface
    {
        $query = Product::find()->alias('p')->active('p')->with('mainPhoto', 'category');
        $ids = ArrayHelper::merge([$category->id], $category->getDescendants()->select('id')->column());
        $query->joinWith(['categoryAssignments ca'], false);
        $query->andWhere(['or', ['p.category_id' => $ids], ['ca.category_id' => $ids]]);
        $query->groupBy('p.id');
        return $this->getProvider($query);
    }

    public function getAllByBrand(Brand $brand): DataProviderInterface
    {
        $query = Product::find()->alias('p')->active('p')->with('mainPhoto');
        $query->andWhere(['p.brand_id' => $brand->id]);
        return $this->getProvider($query);
    }


    public function getFeatured($limit): array
    {
        return Product::find()->with('mainPhoto')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

    public function getPopularProducts($limit): array
    {
        return Product::find()->active()->with('mainPhoto')->orderBy(['rating' => SORT_DESC])->limit($limit)->all();
    }

    public function getProductsByBrand($limit, $brand, $productId): array
    {
        return Product::find()->where(['brand_id' => $brand])->andWhere(['<>','id', $productId])->with('mainPhoto')->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }


    public function getNewsProducts($limit): array
    {
        return Product::find()->where(['label' => Product::LABEL_NEW])->andWhere(['show_in_index' => true])->active()->with('mainPhoto')->orderBy(['created_at' => SORT_DESC])->limit($limit)->all();
    }

    public function getHitsProducts($limit): array
    {
        return Product::find()->where(['label' => Product::LABEL_HIT])->andWhere(['show_in_index' => true])->active()->with('mainPhoto')->orderBy(['created_at' => SORT_DESC])->limit($limit)->all();
    }


    public function find($id): ?Product
    {
        return Product::find()->active()->andWhere(['id' => $id])->one();
    }

    private function getProvider(ActiveQuery $query): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
                'attributes' => [
                    'id' => [
                        'asc' => ['p.id' => SORT_ASC],
                        'desc' => ['p.id' => SORT_DESC],
                    ],
                    'price' => [
                        'asc' => ['p.price_new' => SORT_ASC],
                        'desc' => ['p.price_new' => SORT_DESC],
                    ],
                    'rating' => [
                        'asc' => ['p.rating' => SORT_ASC],
                        'desc' => ['p.rating' => SORT_DESC],
                    ],
                    'name' => [
                        'asc' => ['p.name' => SORT_ASC],
                        'desc' => ['p.name' => SORT_DESC],
                    ],
                ],
            ],
            'pagination' => [
                'pageSizeLimit' => [1, 25],
            ]
        ]);
    }


    public function filter(CatalogForm $form): DataProviderInterface
    {
        $pagination = new Pagination([
            'pageSizeLimit' => [1, 25],
            'validatePage' => false,
            'pageSize' => 2,
        ]);

        $sort = new Sort([
            'defaultOrder' => ['id' => SORT_DESC],
            'attributes' => [
                'id',
                'name',
                'price',
                'rating',
            ],
        ]);


        $q = [
            'index' => 'shop',
            'type' => 'products',
            'body' => [
                '_source' => ['id'],
                'from' => $pagination->getOffset(),
                'size' => $pagination->getLimit(),
                'sort' => array_map(function ($attribute, $direction) {
                    if ($attribute === 'name'){
                        return [$attribute . '.raw' => ['order' => $direction === SORT_ASC ? 'asc' : 'desc']];
                    } else {
                        return [$attribute => ['order' => $direction === SORT_ASC ? 'asc' : 'desc']];
                    }
                }, array_keys($sort->getOrders()), $sort->getOrders()),
                'query' => [
                    'bool' => [
                        'must' => array_merge(
                            array_filter([
                                $form->isChangePriceRange() ? ['range' => ['price' => ['gte' => $form->from, 'lte' => $form->to]]] : false,
                                !empty($form->category) ? ['term' => ['categories' => $form->category]] : false,
                                !empty($form->brands) ? [
                                    'bool' => [
                                        'should' => array_map(function ($brandItem){
                                            return ['match' => ['brand' => $brandItem]];
                                        }, $form->brands),
                                    ],
                                ] : false,
                                !empty($form->label) ? [
                                    'bool' => [
                                        'should' => array_map(function ($labelItem){
                                            return ['match' => ['label' => $labelItem]];
                                        }, $form->label),
                                    ],
                                ] : false,
                                !empty($form->text) ? ['match' => ['name' => $form->text]] : false,
                            ]),
                            array_map(function (ValueForm $value) {
                                return ['nested' => [
                                    'path' => 'values',
                                    'query' => [
                                        'bool' => [
                                            'should' => array_filter(
                                                array_map(function ($val) use ($value) {
                                                    return ['bool' => [
                                                        'must' => [
                                                            ['match' => ['values.characteristic' => $value->getId()]],
                                                            ['match' => ['values.value_string' => $val]],
                                                        ],
                                                    ],];
                                                }, $value->equal),
                                            ),
                                        ],
                                    ],
                                ]];
                            }, array_filter($form->values, function (ValueForm $value) { return $value->isFilled(); }))
                        )
                    ],
                ],
            ],
        ];

//        VarDumper::dump($q, 20, true);

        $response = $this->client->search($q);


        $ids = ArrayHelper::getColumn($response['hits']['hits'], '_source.id');

        if ($ids) {
            $query = Product::find()
                ->active()
                ->with('mainPhoto')
                ->andWhere(['id' => $ids])
                ->orderBy(new Expression('FIELD(id,' . implode(',', $ids) . ')'));
        } else {
            $query = Product::find()->active()->andWhere(['id' => 0]);
        }

        return new SimpleActiveDataProvider([
            'query' => $query,
            'totalCount' => $response['hits']['total'],
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }


    public function search(SearchForm $form): DataProviderInterface
    {
        $pagination = new Pagination([
            'pageSizeLimit' => [1, 25],
            'validatePage' => false,
            'pageSize' => 25,
        ]);

        $sort = new Sort([
            'defaultOrder' => ['id' => SORT_DESC],
            'attributes' => [
                'id',
                'name',
                'price',
                'rating',
            ],
        ]);


        $q = [
            'index' => 'shop',
            'type' => 'products',
            'body' => [
                '_source' => ['id'],
                'from' => $pagination->getOffset(),
                'size' => $pagination->getLimit(),
                'sort' => array_map(function ($attribute, $direction) {
                    if ($attribute === 'name'){
                        return [$attribute . '.raw' => ['order' => $direction === SORT_ASC ? 'asc' : 'desc']];
                    } else {
                        return [$attribute => ['order' => $direction === SORT_ASC ? 'asc' : 'desc']];
                    }
                }, array_keys($sort->getOrders()), $sort->getOrders()),
                'query' => [
                    'bool' => [
                        'must' => array_filter([
                            !empty($form->text) ? ['multi_match' => [
                                'query' => $form->text,
                                'fields' => [ 'name^3', 'code' ]
                            ]] : false,
                        ]),
                    ],
                ],
            ],
        ];

//        VarDumper::dump($q, 20, true);

        $response = $this->client->search($q);


        $ids = ArrayHelper::getColumn($response['hits']['hits'], '_source.id');

        if ($ids) {
            $query = Product::find()
                ->active()
                ->with('mainPhoto')
                ->andWhere(['id' => $ids])
                ->orderBy(new Expression('FIELD(id,' . implode(',', $ids) . ')'));
        } else {
            $query = Product::find()->active()->andWhere(['id' => 0]);
        }

        return new SimpleActiveDataProvider([
            'query' => $query,
            'totalCount' => $response['hits']['total'],
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }


}