<?php


namespace console\controllers;

use frontend\models\UserCategory;
use Yii;
use yii\console\Controller;
use frontend\models\User;
use yii\console\ExitCode;
use yii\helpers\Console;

class RbacUserAssignController extends Controller
{
    public function up($id){

        //Есть ли пользователь с таким id
        $executor = UserCategory::find()
            ->where(['user_id' => $id]);

        $user = (new User)->findIdentity($id);

        if (isset($executor)) {
            //Получаем объект yii\rbac\DbManager, который назначили в конфиге для компонента authManager
            $auth = Yii::$app->authManager;

            //Получаем объект роли
            $role = $auth->getRole('executor');

            //Удаляем все роли пользователя
            $auth->revokeAll($user->id);

            //Присваиваем роль админа по id
            $auth->assign($role, $user->id);
        }

    }
}
