<?php

namespace frontend\controllers;

use frontend\models\TaskCreate;
use frontend\models\User;
use Yii;
use frontend\models\Task;
use yii\web\Controller;
use frontend\models\TaskFilterForm;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;


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

        if (Yii::$app->request->getIsPost()) {
            $task->load($_POST);

            if (Yii::$app->request->isAjax) {
                return ActiveForm::validate($task);
            }

            if ($task->validate()) {

                if ($task->save()) {
                    return $this->goHome();
                }
            } else {
                $errors = $task->getErrors();
            }
        }
        return $this->render('create', [
            'task'=>$task,
            'errors' => $errors?? [],
        ]);
    }
}
