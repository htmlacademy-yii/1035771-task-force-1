<?php


namespace frontend\controllers;

use frontend\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\web\Response;
use frontend\models\User;

class LoginController extends Controller
{
    public function actionIndex()
    {

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
