<?php

namespace shop\helpers;

use kartik\helpers\Html;
use shop\entities\shop\Category;
use Yii;
use yii\helpers\Url;


class CategoryHelper
{

    public static function getCategories()
    {
        return Yii::$app->cache->getOrSet('categories', function () {
            return Category::find()->where(['>', 'depth', 0])->orderBy('lft')->all();
        },1200);
    }


    public static function showCategories(){

        $categories = self::getCategories();
        $level= 1;
        $out = '';

        foreach($categories as $n => $category)
        {
            /** @var Category $category */

            if ($category->depth > $level)
                $out .= '<ul>'."\n";
            else
            {
                for ($i = $level-$category->depth; $i; $i--)
                {
                    $out .= '</ul>'."\n";
                    $out .= "</li>"."\n";
                }
            }

            $out .= '<li>'."\n";
            $out .= "<a href='".Url::to(['/shop/catalog/catalog', 'category' => $category->id])."'>"
                        .Html::encode($category->name)
                    ."</a>"."\n";

            $level = $category->depth;
        }

        for ($i = $level; $i; $i--)
        {
            $out .= '</li>'."\n";
            $out .= '</ul>'."\n";
        }
        return $out;
    }



    public static function showCategoriesForSearch($currentCategory){

        /** @var null|Category  $currentCategory  */

        $classOpen = '';

        $categories = self::getCategories();
        $level= 0;
        $out = '';


        foreach($categories as $n => $category)
        {
            /** @var Category $category */

            switch ($category->depth){
                case 1:
                    $class = 'level-0';
                    break;
                case 2:
                    $class = 'level-1';
                    break;
                case 3:
                    $class = 'level-2';
                    break;
                default:
                    $class = 'level-other';
            }


            if ($currentCategory){
                $classOpen = ($currentCategory->isChildOf($category)) ?  ' open' :  '';
                if ($currentCategory->id == $category->id){
                    $classOpen = ' current';
                }
            }

            $arrow = !$category->isLeaf() ? '<span class="acord-plus"></span>' : '';

            if($category->depth==$level)
                $out .= "<li class='parent'>" . "\n";
            else if($category->depth>$level)
                $out .= '<ul class="'. $class .'">'."\n";
            else
            {
                $out .= "</li>"."\n";

                for($i = $level-$category->depth; $i; $i--)
                {
                    $out .= "</ul>"."\n";
                    $out .= "</li>"."\n";
                }
            }

            $out .= '<li class="parent' . $classOpen .'">';
            $out .= "<a href='".Url::to(['/shop/catalog/catalog', 'category' => $category->id])."'>"
                        .'<span>' .Html::encode($category->name) . '</span>'
                        .$arrow
                    ."</a>";
            $level = $category->depth;
        }

        for($i = $level; $i; $i--)
        {
            $out .= '</li>';
            $out .= '</ul>';
        }

        return $out;
    }



}