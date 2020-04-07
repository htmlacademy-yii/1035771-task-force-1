<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Task;
use yii\web\Controller;
use frontend\models\TaskFilterForm;

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

}
