<?php
namespace shop\forms\manage\user;


use shop\entities\user\User;
use yii\base\Model;


class UserCreateForm extends Model
{
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $password;
    public $role;

    public function rules(): array
    {
        return [
            [['email', 'role'], 'required'],
            ['email', 'email'],
            ['phone', 'replacePhone'],
            [['firstName', 'lastName', 'phone'], 'string', 'max' => 255],
            [['phone', 'email'], 'unique', 'targetClass' => User::class],
            ['role', 'in', 'allowArray' => true,  'range' => array_keys($this->rolesList()), 'message' => 'Role is not available'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function replacePhone()
    {
        $this->phone = trim(str_replace(" ", "", $this->phone));
    }


    public function rolesList(): array
    {
        return User::rolesList();
    }



    public function attributeLabels()
    {
        return [
            'firsName' => 'Имя',
            'lastName' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'Email',
            'role' => 'Роль',
            'password' => 'Пароль',
        ];
    }


}