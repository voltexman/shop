<?php

namespace shop\readModels\shop\views;

use shop\entities\shop\Category;

class CategoryView
{
    public $category;
    public $count;

    public function __construct(Category $category, $count)
    {
        $this->category = $category;
        $this->count = $count;
    }
}

