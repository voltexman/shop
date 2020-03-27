<?php

namespace shop\forms\shop\order;

use shop\forms\CompositeForm;

/**
 * @property CustomerForm $customer
 */
class OrderForm extends CompositeForm
{
    public $note;
    public $delivery_method;

    public function __construct(array $config = [])
    {
        $this->customer = new CustomerForm();
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['delivery_method'], 'required'],
            [['delivery_method'], 'integer'],
            [['note'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'delivery_method' => 'Способ доставки',
            'note' => 'Комментарий',
        ];
    }


    protected function internalForms(): array
    {
        return ['customer'];
    }
}