<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Task;
use yii\web\Controller;
use frontend\models\TaskSidebar;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $tasks = Task::find()
            ->where(['status' => '0'])
            ->joinWith('locations')
            ->joinWith('categories')
            ->joinWith('proposals')
            ->orderBy(['creation_time' => SORT_DESC]);

        $model = new TaskSidebar();
        $model->load(Yii::$app->request->get());

        foreach ($model as $key=>$value) {
            if ($value) {
                switch ($key) {
                    case ('categories'):
                        $tasks->andWhere(['category_id' => $value]);
                        break;

                    case ('withoutProposals'):
                        $tasks->andWhere(['proposals.task_id' => NULL]);
                        break;

                    case ('remote'):
                        $tasks->andWhere(['tasks.location_id' => NULL]);
                        break;

                    case ('period'):
                        $tasks->andWhere(['>=', 'tasks.creation_time', $model->getPeriodTime($value)]);
                        break;

                    case ('search'):
                        $tasks->andWhere(['LIKE', 'tasks.title', $value]);
                        break;
                }
            }
        }

        $task = $tasks->all();

        return $this->render('index',[
            'task' => $task,
            'model' => $model]);
    }

}
