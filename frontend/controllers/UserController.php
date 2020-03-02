<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Task;
use frontend\models\User;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users = User::find()
            ->orderBy(['creation_time' => SORT_DESC])
            ->all();


        return $this->render('index', [
            'users' => $users
        ]);
    }
}
