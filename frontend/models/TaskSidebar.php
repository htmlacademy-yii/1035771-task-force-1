<?php


namespace frontend\models;

use yii\base\Model;
class TaskSidebar extends Model
{
     public $categories;
     public $withoutProposals;
     public $remote;
     public $period;
     public $search;

     public $availableTime = ['day'=>'1 day', 'week'=>'1 week', 'month'=>'1 month', 'all'=>'1000 year'];

    public function attributeLabels()
    {
        return [
            'categories' => 'Категории',
            'withoutProposals' => 'Без откликов',
            'remote' => 'Удалённая работа',
            'period' => 'Период',
            'search' => 'Поиск по названию',
        ];
    }

    public function rules()
    {
        return [
            [['categories', 'withoutProposals', 'remote', 'period', 'search'], 'safe'],
        ];
    }

    public function getPeriodTime($period)
    {
        $date = new \DateTime();
        $date->sub(\DateInterval::createFromDateString($this->availableTime[$period]));
        return $date->format('Y-m-d H:i:s');
    }
}
