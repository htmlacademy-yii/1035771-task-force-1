<?php


namespace frontend\models;

use yii\base\Model;
class TaskCreate extends Model
{
    public $id;
    public $title;
    public $description;
    public $creation_time;
    public $status;
    public $url_file;
    public $deadline;
    public $budget;
    public $customer_id;
    public $executor_id;
    public $category_id;
    public $location_id;

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Мне нужно',
            'description' => 'Подробности задания',
            'creation_time' => 'Creation Time',
            'status' => 'Status',
            'url_file' => 'Файлы',
            'deadline' => 'Срок исполнения',
            'budget' => 'Бюджет',
            'customer_id' => 'Заказчик',
            'executor_id' => 'Executor ID',
            'category_id' => 'Категория',
            'location_id' => 'Локация',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'description', 'customer_id', 'category_id'], 'required'],
            [['creation_time', 'deadline'], 'safe'],
            [['status', 'budget', 'customer_id', 'executor_id', 'category_id', 'location_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description', 'url_file'], 'string', 'max' => 500],
        ];
    }
}
