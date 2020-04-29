<?php


namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Registration extends ActiveRecord
{
    public static function tableName(){
        return 'users';
    }

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
            ['email', 'unique'],
            ['password', 'string', 'min' => 8],
        ];
    }
}
