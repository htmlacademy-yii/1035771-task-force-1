<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use Yii;
use yii\web\Controller;


class LoginController extends Controller
{

    public function actionIndex()
    {
       //$this->layout = '@app/views/landing/index.php';
        $loginForm = new LoginForm();
        if (Yii::$app->request->getIsPost()) {
            $loginForm->load(Yii::$app->request->post());
            if ($loginForm->validate()) {
                $user = $loginForm->getUser();
                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }
        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }
}
