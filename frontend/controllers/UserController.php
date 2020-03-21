<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\UserCategory;
use Yii;
use frontend\models\User;
use frontend\models\UserSidebar;
use yii\web\Controller;


class UserController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()
            ->orderBy(['users.creation_time' => SORT_DESC]);

        $model2 = new UserSidebar();
        $model2->load($_GET);

        foreach ($model2 as $key => $value) {
           if ($value) {
               switch ($key) {

                   case ('categories'):
                       $users = $users->joinWith('categories');
                       $users = $users->andWhere([UserCategory::tableName().'.category_id' => $model2->categories]);
                       break;
                       
                   case ('review'):
                       $users = $users->andWhere('users.views != 0');
                       break;

                   case ('search'):
                       $users->andWhere(['LIKE', 'users.info', $value]);
                       break;
               }
           }
        }

        $users = $users->all();

        return $this->render('index', [
            'users' => $users,
            'model2' => $model2,
        ]);
    }
}
