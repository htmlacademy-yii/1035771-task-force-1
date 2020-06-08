<?php


namespace frontend\controllers;

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
              //  'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
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
