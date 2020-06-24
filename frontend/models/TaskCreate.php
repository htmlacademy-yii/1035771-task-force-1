<?php


namespace frontend\models;

use yii\base\Model;

use frontend\models\User;
use Yii;
use frontend\models\Task;
use frontend\models\File;
use yii\web\Controller;
use frontend\models\TaskFile;
use frontend\models\TaskFilterForm;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

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
            [['title', 'description', 'customer_id'], 'required'],
            [['creation_time', 'deadline', 'url_file'], 'safe'],
            [['status', 'customer_id', 'executor_id', 'category_id', 'location_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['category_id'], 'required', 'message' => 'Это поле должно быть выбрано.<br>Задание должно принадлежать одной из категорий'],
            [['budget'], 'integer', 'min' => '1'],
            [['deadline'], 'date', 'format' => 'Y-m-d', 'min' => date('Y-m-d')],
            [['url_file'], 'file', 'skipOnEmpty' => true],
        ];
    }

    public function create($model): ?Task
    {

        $task = new Task();
        $task->title = $model->title;
        $task->description = $model->description;
        $task->category_id = $model->category_id;
        $task->budget = $model->budget;
        $task->deadline = $model->deadline;
        $task->customer_id = Yii::$app->user->getIdentity()->id;
        $task->url_file = $model->upload();

        if (!$task->save()) {
            return null;
        }

        return $task;
    }

    public function upload()
    {

        if ($this->validate()) {
            $this->url_file->saveAs('upload/' . $this->url_file->baseName . '.' . $this->url_file->extension);
            return true;
        } else {
            return false;
        }
    }
}
