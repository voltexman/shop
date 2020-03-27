<?php
namespace shop\forms\manage\user;

use shop\entities\user\User;
use Yii;
use yii\base\Model;

class UserEditForm extends Model
{
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $role;

    public $_user;

    public function __construct(User $user, array $config = [])
    {
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $roles = Yii::$app->authManager->getRolesByUser($user->id);
        $this->role = $roles ? reset($roles)->name : null;
        $this->_user = $user;
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            [['email', 'role'], 'required'],
            ['email', 'email'],
            ['phone', 'replacePhone'],
            [['firstName', 'lastName', 'phone'], 'string', 'max' => 255],
            [['phone', 'email'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
            ['role', 'in', 'allowArray' => true,  'range' => array_keys($this->rolesList()), 'message' => 'Role is not available'],
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