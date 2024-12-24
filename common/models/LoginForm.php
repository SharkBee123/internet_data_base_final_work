<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241216
 * 登录php
 */

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Console;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {   
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if($user == null){
                echo "<script>console.log('Console: user is null"  . "' );</script>";
            }

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {   
        // $console = $this->username;
        // echo "<script>console.log('Console: " . $console . "' );</script>";
        // $console = $this->password;
        // echo "<script>console.log('Console: " . $console . "' );</script>";

        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }  

        return $this->_user;
    }
}
