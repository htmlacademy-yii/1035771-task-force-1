<?php

namespace frontend\controllers;

use frontend\models\User;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user = User::findOne(2);
        return (implode(',', [$user->name, $user->email, $user->password]));
    }
}
