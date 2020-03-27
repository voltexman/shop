<?php

namespace shop\readModels\shop;

use shop\entities\shop\Brand;

class BrandReadRepository
{
    public function find($id): ?Brand
    {
        return Brand::findOne($id);
    }


    public function getBrandsWishShowInIndex($limit): array
    {
        return Brand::find()->where(['show_in_index' => true])->orderBy(['id' => SORT_DESC])->limit($limit)->all();
    }

}