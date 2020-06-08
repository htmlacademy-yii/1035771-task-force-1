<?php


namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\User;
use yii\widgets\ActiveForm;

class RegistrationController extends Controller
{

    public function actionIndex()
    {
       //$this->layout = '@app/views/landing/index.php';
        $user = new User();

        if (Yii::$app->request->getIsPost()) {
            $user->load($_POST);

            if (Yii::$app->request->isAjax) {
                return ActiveForm::validate($user);
            }

            if ($user->validate()) {

                if ($user->save()) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('registration', [
            'userRegistration' => $user
        ]);
    }
}
