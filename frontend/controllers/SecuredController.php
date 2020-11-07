<?php


namespace frontend\controllers;

use frontend\models\User;
use frontend\models\UserCategory;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SecuredController extends Controller
{
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::class,
                //'only' => ['login', 'registration', 'landing', 'logout', 'index', 'view', 'create'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],

                    ],

                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createTask'],
                    ],

                    [
                        'actions' => ['login', 'registration', 'landing'],
                        'allow' => true,
                        'roles' => ['?'],

                    ],

                    [
                        'actions' => ['index', 'view', 'logout'],
                        'allow' => false,
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            return $action->controller->redirect('/landing');
                        }
                    ],

                    [
                        'actions' => ['login', 'registration', 'landing'],
                        'allow' => false,
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            return $action->controller->redirect('/');
                        }
                    ]
                ],
            ],

        ];
    }
}
