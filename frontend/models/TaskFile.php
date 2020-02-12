<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task_files".
 *
 * @property int $id
 * @property string $file_id
 * @property int $task_id
 */
class TaskFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'task_id'], 'required'],
            [['task_id'], 'integer'],
            [['file_id'], 'string', 'max' => 500],
            [['file_id', 'task_id'], 'unique', 'targetAttribute' => ['file_id', 'task_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'task_id' => 'Task ID',
        ];
    }
}
