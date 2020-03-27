<?php

namespace shop\forms\manage\payment;

use shop\entities\payment\PaymentKeys;
use yii\base\Model;



class PaymentKeysForm extends Model
{

    public $privateKey;
    public $publicKey;

    private $_paymentKeys;

    public function __construct(PaymentKeys $paymentKeys, $config = [])
    {

        $this->privateKey = $paymentKeys->private_key;
        $this->publicKey = $paymentKeys->public_key;
        $this->_paymentKeys = $paymentKeys;

        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['privateKey', 'publicKey'], 'required'],
            [['privateKey', 'publicKey'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'privateKey' => 'Приватный ключ (private_key)',
            'publicKey' => 'Публичный ключ (public_key)',
        ];
    }


}