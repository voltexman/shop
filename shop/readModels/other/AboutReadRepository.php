<?php

namespace shop\readModels\other;
use shop\entities\other\AboutUs;

class AboutReadRepository
{


    public function getAboutUs()
    {
        return AboutUs::find()->where(['id' => 1])->one();
    }



}