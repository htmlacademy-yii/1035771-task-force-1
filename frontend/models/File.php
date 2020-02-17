<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $url
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
        ];
    }

    public function getUsers() {
        return $this->hasMany(Users::class, ['id' => 'user_id'])->viaTable('user_files', ['file_id' => 'id']);
    }

    public function getTasks() {
        return $this->hasMany(Tasks::class, ['id' => 'task_id'])->viaTable('task_files', ['file_id' => 'id']);
    }

}
