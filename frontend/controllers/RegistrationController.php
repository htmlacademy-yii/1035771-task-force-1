<?php


namespace frontend\controllers;
use frontend\models\Registration;
use Yii;
use yii\web\Controller;
use frontend\models\User;
use yii\widgets\ActiveForm;

class RegistrationController extends Controller
{

    public function actionIndex()
    {
        $user = new User();

        if (Yii::$app->request->getIsPost()) {
            $user->load($_POST);

            if (Yii::$app->request->isAjax) {
                return ActiveForm::validate($user);
            }

            if ($user->validate()) {
                $user->email;
                $user->name;
                $user->location_id;
                $user->setPassword($user->password);

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
