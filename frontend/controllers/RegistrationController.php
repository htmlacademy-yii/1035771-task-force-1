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

        $userRegistration = new Registration();
        if (Yii::$app->request->getIsPost()) {
            $userRegistration->load(Yii::$app->request->post());

            if (Yii::$app->request->isAjax) {
                return ActiveForm::validate($userRegistration);
            }

            if ($userRegistration->validate()) {
                $user = new User();
                $user->email = $userRegistration->email;
                $user->name = $userRegistration->name;
                $user->setPassword($userRegistration->password);
                $user->location_id = $userRegistration->location_id;

                if($user->save()) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('registration', [
            'userRegistration' => $userRegistration
        ]);
    }
}
