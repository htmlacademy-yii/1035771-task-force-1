<?php


namespace frontend\models;

use yii\base\Model;
class TaskFilterForm extends Model
{
     public $categories;
     public $withoutProposals;
     public $remote;
     public $period;
     public $search;

     const PERIOD_DAY = 'day';
     const PERIOD_WEEK = 'week';
     const PERIOD_MONTH = 'month';
     const PERIOD_ALL = 'all';

     private $availableTime = [self::PERIOD_DAY=>'1 day', self::PERIOD_WEEK=>'1 week', self::PERIOD_MONTH=>'1 month', self::PERIOD_ALL=>'1000 year'];

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
