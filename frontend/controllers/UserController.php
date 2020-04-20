<?php

namespace frontend\controllers;

use frontend\models\UserCategory;
use Yii;
use frontend\models\User;
use frontend\models\UserFilterForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionIndex()
    {

        $formUser = new UserFilterForm();
        $formUser->load(Yii::$app->request->get());
        $users = (new User)->findByFilterForm($formUser);

        return $this->render('index', [
            'users' => $users,
            'formUser' => $formUser,
        ]);
    }

    public function actionView($id) {

        $user = User::findOne($id);

        if (!$user) {
            throw new NotFoundHttpException("Пользователь с ID $id не найден");
        }

        return $this->render('view', ['user'=>$user]);
    }

}
