<?php


namespace frontend\models;

use yii\base\Model;

class Registration extends Model
{
    public $email;
    public $name;
    public $location_id;
    public $password;

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Электронная почта',
            'location_id' => 'Город проживания',
            'password' => 'Пароль',
        ];
    }
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'location_id'], 'safe'],
            [['name', 'email', 'password', 'location_id'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'К сожалению, адрес электронной почты занят.'],
            ['password', 'string', 'min' => 8],
        ];
    }
}
