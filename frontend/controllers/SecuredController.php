<?php


namespace frontend\controllers;

use frontend\models\User;
use frontend\models\UserCategory;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class SecuredController extends Controller
{
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],

                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {

                            $id = Yii::$app->request->get('id');
                            $user = User::find()->where(['id' => $id == Yii::$app->user->getId()])->one();
                            $user_category = UserCategory::find()->where(['user_id' => $id ==Yii::$app->user->getId()])->one();

                            return $user !== $user_category;
                        }

                    ],

                    [
                        'actions' => ['login', 'registration', 'landing'],
                        'allow' => true,
                        'roles' => ['?'],

                    ],

                ]
            ]
        ];
    }
}
