<?php


namespace frontend\controllers;

use frontend\models\LoginForm;
use yii\web\Controller;

class LandingController extends Controller
{
    public function actionIndex() {
        $this->layout = '@app/views/landing/index.php';
        return $this->render('index', []);
    }

}
