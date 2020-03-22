<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\UserCategory;
use Yii;
use frontend\models\User;
use frontend\models\UserSidebar;
use yii\web\Controller;
use yii\db\Query;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = User::find()

            ->orderBy(['users.creation_time' => SORT_DESC]);

        $model2 = new UserSidebar();
        $model2->load($_GET);

        foreach ($model2 as $key => $value) {
           if ($value) {
               switch ($key) {

                   case 'categories':
                       $user = $user->joinWith('categories');
                       $user = $user->andWhere([UserCategory::tableName().'.category_id' => $model2->categories]);
                       break;

                   case 'review':
                       $user = $user->andWhere('users.views != 0');
                       break;

                   case 'online':
                       $user->andWhere(['>', 'users.last_active_time', date("Y-m-d H:i:s", strtotime("- 1 hour"))]);
                       break;

                   

                   case 'search':
                       $user->andWhere(['LIKE', 'users.info', $value]);
                       break;
               }
           }
        }

        $users = $user->all();

        return $this->render('index', [
            'users' => $users,
            'model2' => $model2,
        ]);
    }
}
