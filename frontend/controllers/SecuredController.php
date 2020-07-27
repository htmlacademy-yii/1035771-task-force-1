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
               // 'only' => ['login', 'registration', 'landing', 'create', 'task', 'user'],
                'rules' => [
                    [

                        'allow' => true,
                        'roles' => ['@'],

                    ],

                    [
                        'actions' => ['create'],
                        'allow' => false,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (new User)->getRole(Yii::$app->request->get('id'));
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
