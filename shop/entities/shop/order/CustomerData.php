<?php

namespace shop\entities\shop\order;

class CustomerData
{
    public $phone;
    public $first_name;
    public $last_name;
    public $city;
    public $department_post;

    public function __construct($phone, $first_name, $last_name, $city, $department_post)
    {
        $this->phone = $phone;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city = $city;
        $this->department_post = $department_post;
    }
}