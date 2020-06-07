<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;
class Type extends ActiveRecord
{
    /**
     * @var mixed|string|null
     */
    public $password;

    public function getAll() {
        return $users=User::find()->all();
    }

    public function beforeSave($password)
    {
        if (!parent::beforeSave($password)) {
            return false;
        }

        $this->password = Yii::$app->security->generatePasswordHash($password);
            return true;
    }
}
