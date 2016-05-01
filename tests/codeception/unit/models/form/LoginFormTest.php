<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests\codeception\unit\models\form;

use app\models\form\LoginForm;
use tests\codeception\unit\fixtures\UserFixture;
use yii\codeception\DbTestCase;

class LoginFormTest extends DbTestCase
{
    protected function tearDown()
    {
        app()->user->logout();
        parent::tearDown();
    }

    public function fixtures()
    {
        return [
            'users' => [
                'class' => UserFixture::class,
                'dataFile' => '@tests/codeception/unit/fixtures/data/login.php',
            ],
        ];
    }

    public function testLoginFailure()
    {
        $model = new LoginForm([
            'username' => 'wrong_username',
            'password' => 'wrong_password',
        ]);
        $this->assertFalse($model->login());
        $this->assertNotEmpty($model->errors);
        $this->assertTrue(user()->isGuest);
    }

    public function testLoginSuccess()
    {
        $model = new LoginForm([
            'username' => $this->users['user1']['username'],
            'password' => str_repeat($this->users['user1']['username'], 2),
        ]);
        $this->assertTrue($model->login());
        $this->assertEmpty($model->errors);
        $this->assertFalse(user()->isGuest);
    }
}
