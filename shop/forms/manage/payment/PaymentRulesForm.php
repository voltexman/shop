<?php

namespace shop\forms\manage\payment;

use shop\entities\payment\PaymentRules;
use yii\base\Model;



class PaymentRulesForm extends Model
{

    public $title;
    public $description;

    private $_paymentRules;

    public function __construct(PaymentRules $paymentRules, $config = [])
    {

        $this->title = $paymentRules->title;
        $this->description = $paymentRules->description;
        $this->_paymentRules = $paymentRules;

        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание правил оплаты',
        ];
    }


}