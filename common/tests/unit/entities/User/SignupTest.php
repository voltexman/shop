<?php

namespace common\tests\unit\entities\User;
use common\entities\User;

use Codeception\Test\Unit;

class SignupTest extends Unit
{
    public function testSuccess(){
        $user = User::signup(
            $username = 'username',
            $email = 'email@site.com',
            $password = 'password'
        );
        $this->assertEquals($username, $user->username);
        $this->assertEquals($email, $user->email);
        $this->assertNotEmpty($user->password_hash);
        $this->assertNotEquals($password, $user->password_hash);
        $this->assertNotEmpty($user->created_at);
        $this->assertNotEmpty($user->auth_key);
        $this->assertNotEmpty($user->email_confirm_token);
        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());
    }
}