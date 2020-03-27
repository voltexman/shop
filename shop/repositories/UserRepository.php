<?php
namespace shop\repositories;


use shop\entities\user\User;
use shop\dispatchers\SimpleEventDispatcher;

class UserRepository
{
    private $dispatcher;
    public function __construct(SimpleEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function save(User $user): void
    {
        if (!$user->save()){
            throw new \RuntimeException('Saving error.');
        }
        $this->dispatcher->dispatchAll($user->releaseEvents());
    }


    public function remove(User $user): void
    {
        if (!$user->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        $this->dispatcher->dispatchAll($user->releaseEvents());
    }



    public function existByPasswordResetToken(string $token): bool
    {
        return (bool) User::findByPasswordResetToken($token);
    }

    public function getUserById($id): User
    {
        return $this->getUserBy(['id' => $id]);
    }

    public function getUserByEmail(string $email): User
    {
        return $this->getUserBy(['email'=> $email]);
    }

    public function getUserByPasswordResetToken(string $token): User
    {
        return $this->getUserBy(['password_reset_token'=> $token]);
    }

    public function getUserByConfirmToken(string $token): User
    {
        return $this->getUserBy(['email_confirm_token'=> $token]);
    }

    public function findByUsername(string $username): User
    {
        return $this->getUserBy(['username'=> $username]);
    }



    private function getUserBy(array $condition): User
    {
        if (!$user = User::find()->andWhere($condition)->limit(1)->one()){
            throw new NotFoundException('User not found.');
        }
        return $user;
    }







}