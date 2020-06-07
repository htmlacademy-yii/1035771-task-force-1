<?php


namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;

/**
 * @method hashPassword($password)
 */
class LoginForm extends Model
{
    public $email;
    public $password;

    private $_user;

    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    public function rules()
    {
        return [

            [['email', 'password'], 'required'],
            ['password', 'string', 'min' => 8],

            ['password', 'uniqueByType'],

        ];
    }

    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Неверное имя пользователя или пароль.');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email' => $this->email]);
        }

        return $this->_user;
    }

    public function uniqueByType($attribute, $params) {
         if ($this->password) {
             $existModel = Type::find()->byType($this->password)->byEmail($this->$attribute)->one();
             if ($existModel) {
                 $this->addError($attribute, 'Serial number must be unique for type.');
             }
         }
     }
}
