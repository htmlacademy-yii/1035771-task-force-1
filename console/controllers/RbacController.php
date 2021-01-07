<?php

namespace console\controllers;

use app\models\UserCategory;
use frontend\models\User;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit($id)
    {
        $auth = Yii::$app->authManager;
/*
        $rule = new CustomerRule();
        $auth->add($rule);

        // добавляем разрешение "createTask"
        $createTask = $auth->createPermission('createTask');
        $createTask->description = 'Create a task';
        $auth->add($createTask);

        // добавляем разрешение "completeTask"
        $completeTask = $auth->createPermission('completeTask');
        $completeTask->description = 'Complete the task';
        $auth->add($completeTask);

        // добавляем разрешение "cancelTask"
        $cancelTask = $auth->createPermission('cancelTask');
        $cancelTask->description = 'Cancel task';
        $auth->add($cancelTask);

        // добавляем разрешение "acceptTask"
        $acceptTask = $auth->createPermission('acceptTask');
        $acceptTask->description = 'Accept the task';
        $auth->add($acceptTask);

        // добавляем разрешение "respondTask"
        $respondTask = $auth->createPermission('respondTaskTask');
        $respondTask->description = 'Respond to the task';
        $auth->add($respondTask);

        // добавляем разрешение "giveUpTask"
        $giveUpTask = $auth->createPermission('giveUpTask');
        $giveUpTask->description = 'Give up the task';
        $auth->add($giveUpTask);

        // добавляем разрешение "updateTask"
        $updateTask = $auth->createPermission('updateTask');
        $updateTask->description = 'Update task';
        $auth->add($updateTask);

        // добавляем разрешение "updateOwnTask"
        $updateOwnTask = $auth->createPermission('updateOwnTask');
        $updateOwnTask->description = 'Update own task';
        $updateOwnTask->ruleName = $rule->name;
        $auth->add($updateOwnTask);

        $auth->addChild($updateOwnTask, $updateTask);

        // добавляем роль "customer" и даём роли разрешение "createTask", "completeTask",
        //"cancelTask", "acceptTask"
        $customer = $auth->createRole('customer');
        $customer->description = 'Заказчик';
        $auth->add($customer);
        $auth->addChild($customer, $createTask);
        $auth->addChild($customer, $completeTask);
        $auth->addChild($customer, $cancelTask);
        $auth->addChild($customer, $acceptTask);
        $auth->addChild($customer, $updateOwnTask);

        // добавляем роль "Executor" и даём роли разрешение "createTask", "completeTask",
        //"cancelTask", "acceptTask"
        $executor = $auth->createRole('executor');
        $executor->description = 'Исполнитель';
        $auth->add($executor);
        $auth->addChild($executor, $respondTask);
        $auth->addChild($executor, $giveUpTask);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "customer" и "executor"
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $auth->add($admin);
        $auth->addChild($admin, $updateTask);
        $auth->addChild($admin, $customer);
        $auth->addChild($admin, $executor);

        $auth->assign($admin, 7);
        $auth->assign($customer, 1);
        $auth->assign($executor, 2);
*/

        $user = (new User)->id;

        $executor = \frontend\models\UserCategory::find()
            ->where(['user_id' => $id])->all();

        if ($user != $executor) {

            //Получаем объект роли
            $role = $auth->getRole('executor');

            //Удаляем все роли пользователя
            $auth->revokeAll($id);

            //Присваиваем роль по id
            $auth->assign($role, $id);

        } else {

            $role = $auth->getRole('customer');

            $auth->revokeAll($id);

            $auth->assign($role, $id);
            }
    }

}
