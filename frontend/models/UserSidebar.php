<?php


namespace frontend\models;

use yii\base\Model;
class UserSidebar extends Model
{
    public $categories;
    public $free;
    public $online;
    public $review;
    public $search;

    public function attributeLabels()
    {
        return [
            'categories' => 'Категории',
            'free' => 'Сейчас свободен',
            'online' => 'Сейчас онлайн',
            'review' => 'Есть отзывы',
            'search' => 'Поиск по описанию',
        ];
    }

    public function rules()
    {
        return [
            [['categories', 'free', 'online', 'review', 'search'], 'safe'],
        ];
    }
}
