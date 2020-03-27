<?php

namespace shop\useCases\shop\viewedProducts\storage;

use shop\components\storage\StorageInterface;
use shop\entities\shop\product\Product;
use shop\useCases\shop\viewedProducts\ViewedProduct;
use Yii;
use yii\helpers\Json;
use yii\web\Cookie;

class ViewedCookieStorage implements StorageInterface
{
    private $key;
    private $timeout;

    public function __construct($key, $timeout)
    {
        $this->key = $key;
        $this->timeout = $timeout;
    }

    public function load(): array
    {
        if ($cookie = Yii::$app->request->cookies->get($this->key)) {
            return array_filter(array_map(function (array $row) {
                if (isset($row['viewed_product']) && $product = Product::find()->active()->andWhere(['id' => $row['viewed_product']])->one()) {
                    /** @var Product $product */
                    return new ViewedProduct($product);
                }
                return false;
            }, Json::decode($cookie->value)));
        }
        return [];
    }

    public function save(array $items): void
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => $this->key,
            'value' => Json::encode(array_map(function (ViewedProduct $item) {
                return [
                    'viewed_product' => $item->getProductId(),
                ];
            }, $items)),
            'expire' => time() + $this->timeout,
        ]));
    }
} 