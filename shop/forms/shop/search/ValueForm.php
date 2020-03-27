<?php

namespace shop\forms\shop\search;

use shop\entities\shop\Characteristic;
use yii\base\Model;

/**
 * @property integer $id
 */
class ValueForm extends Model
{

    public $equal;

    private $_characteristic;

    public function __construct(Characteristic $order, $config = [])
    {
        $this->_characteristic = $order;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['equal'], 'safe'],

        ];
    }

    public function isFilled(): bool
    {
        return !empty($this->equal);
    }

    public function variantsList(): array
    {
        return $this->_characteristic->variants ? array_combine($this->_characteristic->variants, $this->_characteristic->variants) : [];
    }

    public function variantsListById($id): array
    {
        $characteristic = Characteristic::findOne($id);
        return array_combine($characteristic->variants, $characteristic->variants);
    }

    public function getCharacteristicName(): string
    {
        return $this->_characteristic->name;
    }

    public function isRequired(): bool
    {
        return $this->_characteristic->required ? true : false;
    }

    public function getId(): int
    {
        return $this->_characteristic->id;
    }

    public function formName(): string
    {
        return 'v';
    }
}