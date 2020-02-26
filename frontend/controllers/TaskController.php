<?php

namespace frontend\controllers;

use frontend\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $tasks = Task::find()
            ->where(['status' => '0'])
            ->joinWith('locations')
            ->joinWith('categories')
            ->orderBy(['creation_time' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'task' => $tasks,
        ]);
    }
}
