<?php
namespace shop\forms\manage\other;


use shop\entities\other\DeliveryAndPayment;
use yii\base\Model;


class DeliveryAndPaymentForm extends Model
{
    public $title;
    public $description;

    private $_deliveryAndPayment;


    public function __construct(DeliveryAndPayment $deliveryAndPayment = null, $config = [])
    {
        if ($deliveryAndPayment) {
            $this->title = $deliveryAndPayment->title;
            $this->description = $deliveryAndPayment->description;
            $this->_deliveryAndPayment = $deliveryAndPayment;
        }
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
            'description' => 'Описания',
        ];
    }


}