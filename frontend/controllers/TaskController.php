<?php

namespace frontend\controllers;

use frontend\models\User;
use Yii;
use frontend\models\Task;
use yii\web\Controller;
use frontend\models\TaskFilterForm;
use yii\web\NotFoundHttpException;


class TaskController extends Controller
{
    public function actionIndex()
    {

        $formTask = new TaskFilterForm();
        $formTask->load(Yii::$app->request->get());
        $tasks = (new Task)->findByFilterForm($formTask);

        return $this->render('index',[
            'tasks' => $tasks,
            'formTask' => $formTask]);
    }

    public function actionView($id) {

       $task = Task::findOne($id);

       if (!$task) {
           throw new NotFoundHttpException("Задание с ID $id не найдено");
       }

        return $this->render('view', ['task'=>$task]);
    }

}
