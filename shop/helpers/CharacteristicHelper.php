<?php

namespace shop\helpers;

use shop\entities\shop\Characteristic;
use shop\entities\shop\Variant;
use yii\helpers\ArrayHelper;

class CharacteristicHelper
{
    public static function typeList(): array
    {
        return [
            Characteristic::TYPE_STRING => 'String',
            Characteristic::TYPE_INTEGER => 'Integer number',
            Characteristic::TYPE_FLOAT => 'Float number',
        ];
    }

    public static function typeName($type): string
    {
        return ArrayHelper::getValue(self::typeList(), $type);
    }


    public static function getVariantsAsText(Characteristic $characteristic)
    {
        $out = '';
        if (!empty($characteristic->variants)){
            foreach ($characteristic->variants as $variant){
                /** @var Variant $variant */
                $out .=  $variant->text . " -----> " . $variant->sum . PHP_EOL;
            }
        }
        return $out;

    }

}