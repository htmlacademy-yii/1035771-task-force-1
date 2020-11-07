<?php


namespace console\controllers;


use frontend\models\UserCategory;
use yii\rbac\Rule;
use Yii;

class CustomerRule extends Rule
{

    /**
     * @inheritDoc
     */
    public $name = 'isCustomer';

    public function execute($user, $item, $params)
    {

        return isset($params['create']) ? $params['create']->createdBy == $user : false;

    }

}
