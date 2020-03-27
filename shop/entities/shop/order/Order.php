<?php

namespace shop\entities\shop\order;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use shop\entities\AggregateRoot;
use shop\entities\EventTrait;
use shop\entities\shop\order\events\OrderCreateRequested;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;

/**
 * @property int $id
 * @property int $created_at
 * @property int $delivery_method
 * @property int $cost
 * @property int $note
 * @property int $current_status
 * @property string $cancel_reason
 *
 * @property CustomerData $customerData
 * @property OrderItem[] $items
 * @property Status[] $statuses
 */
class Order extends ActiveRecord implements AggregateRoot
{
    use EventTrait;

    public $customerData;
    public $statuses = [];


    const DELIVERY_METHOD_NEW_POST = 1;
    const DELIVERY_METHOD_PICKUP = 2;


    public static function create($deliveryMethod, CustomerData $customerData, array $items, $cost, $note): self
    {
        $order = new static();
        $order->delivery_method = $deliveryMethod;
        $order->customerData = $customerData;
        $order->items = $items;
        $order->cost = $cost;
        $order->note = $note;
        $order->created_at = time();
        $order->addStatus(Status::NEW);
        $order->recordEvent(new OrderCreateRequested($order));
        return $order;
    }

    public function edit($status): void
    {
        $this->addStatus($status);
    }



    public function send(): void
    {
        if ($this->isSent()) {
            throw new \DomainException('Order is already sent.');
        }
        $this->addStatus(Status::SENT);
    }

    public function complete(): void
    {
        if ($this->isCompleted()) {
            throw new \DomainException('Order is already completed.');
        }
        $this->addStatus(Status::COMPLETED);
    }

    public function cancel($reason): void
    {
        if ($this->isCancelled()) {
            throw new \DomainException('Order is already cancelled.');
        }
        $this->cancel_reason = $reason;
        $this->addStatus(Status::CANCELLED);
    }

    public function getTotalCost(): int
    {
        return $this->cost;
    }

    public function canBePaid(): bool
    {
        return $this->isNew();
    }

    public function isNew(): bool
    {
        return $this->current_status == Status::NEW;
    }

    public function isPaid(): bool
    {
        return $this->current_status == Status::PAID;
    }

    public function isSent(): bool
    {
        return $this->current_status == Status::SENT;
    }

    public function isCompleted(): bool
    {
        return $this->current_status == Status::COMPLETED;
    }

    public function isCancelled(): bool
    {
        return $this->current_status == Status::CANCELLED;
    }

    private function addStatus($value): void
    {
        $this->statuses[] = new Status($value, time());
        $this->current_status = $value;
    }

    ##########################

    public function getItems(): ActiveQuery
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    ##########################

    public static function tableName(): string
    {
        return '{{%shop_orders}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['items'],
            ],
        ];
    }

    public function transactions(): array
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function afterFind(): void
    {
        $this->statuses = array_map(function ($row) {
            return new Status(
                $row['value'],
                $row['created_at']
            );
        }, Json::decode($this->getAttribute('statuses_json')));

        $this->customerData = new CustomerData(
            $this->getAttribute('customer_phone'),
            $this->getAttribute('customer_first_name'),
            $this->getAttribute('customer_last_name'),
            $this->getAttribute('customer_city'),
            $this->getAttribute('department_post')
        );


        parent::afterFind();
    }

    public function beforeSave($insert): bool
    {
        $this->setAttribute('statuses_json', Json::encode(array_map(function (Status $status) {
            return [
                'value' => $status->value,
                'created_at' => $status->created_at,
            ];
        }, $this->statuses)));

        $this->setAttribute('customer_phone', $this->customerData->phone);
        $this->setAttribute('customer_first_name', $this->customerData->first_name);
        $this->setAttribute('customer_last_name', $this->customerData->last_name);
        $this->setAttribute('customer_city', $this->customerData->city);
        $this->setAttribute('department_post', $this->customerData->department_post);


        return parent::beforeSave($insert);
    }
}