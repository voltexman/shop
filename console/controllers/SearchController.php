<?php

namespace console\controllers;

use Elasticsearch\Common\Exceptions\Missing404Exception;
use shop\entities\shop\product\Product;
use shop\services\search\ProductIndexer;
use yii\console\Controller;

class SearchController extends Controller
{
    private $indexer;

    public function __construct($id, $module, ProductIndexer $indexer, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->indexer = $indexer;
    }


    public function actionReindex(): void
    {
        $query = Product::find()
            ->active()
            ->with(['category', 'brand'])
            ->orderBy('id');

        $this->stdout('Clearing' . PHP_EOL);

        try {
            $this->indexer->clear();
        } catch (Missing404Exception $e){
            $this->stdout('Index is Empty' . PHP_EOL);
        }


        $this->stdout('Indexing of products' . PHP_EOL);

        $this->indexer->createMapping();

        foreach ($query->each() as $product) {
            /** @var Product $product */
            $this->stdout('Product #' . $product->id . PHP_EOL);
            $this->indexer->index($product);
        }

        $this->stdout('Done!' . PHP_EOL);
    }


}