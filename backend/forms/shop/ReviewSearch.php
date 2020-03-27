<?php

namespace backend\forms\shop;


use shop\entities\shop\product\Review;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ReviewSearch extends Model
{

    public $product;
    public $date_from;
    public $date_to;

    public function rules(): array
    {
        return [
            [['product'], 'string'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Review::find()->joinWith(['product']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $dataProvider->sort->attributes['product'] = [
            'asc' => ['shop_products.name' => SORT_ASC],
            'desc' => ['shop_products.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }


        $query
            ->andFilterWhere(['like', 'shop_products.name', $this->product])
            ->andFilterWhere(['>=', 'shop_reviews.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'shop_reviews.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }

}
