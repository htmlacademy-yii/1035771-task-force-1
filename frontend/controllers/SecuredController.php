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
                            $user = UserCategory::findOne($id);

                            return $user->user_id == Yii::$app->user->getId();
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
