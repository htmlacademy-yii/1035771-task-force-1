<?php

namespace frontend\controllers;

use frontend\models\TaskCreate;
use frontend\models\User;
use frontend\models\UserCategory;
use Yii;
use frontend\models\Task;
use frontend\models\File;
use frontend\models\TaskFile;
use yii\web\Controller;
use frontend\models\TaskFilterForm;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class TaskController extends SecuredController
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

    public function actionCreate() {

            $task = new TaskCreate();

            $task->customer_id = Yii::$app->user->id;

            if (Yii::$app->request->getIsPost()) {
                $task->load($_POST);

                if ($task->validate()) {

                    if ($task->create($task)) {

                        return $this->goHome();
                    }
                } else {
                    $errors = $task->getErrors();
                }
            }

            return $this->render('create', [
                'task' => $task,
                'errors' => $errors ?? [],
            ]);

    }

}
