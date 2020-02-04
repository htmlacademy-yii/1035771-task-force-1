<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposals".
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $budget
 * @property string|null $creation_time
 * @property int $executor_id
 * @property int $task_id
 *
 * @property Users $executor
 * @property Tasks $task
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proposals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['budget', 'executor_id', 'task_id'], 'integer'],
            [['creation_time'], 'safe'],
            [['executor_id', 'task_id'], 'required'],
            [['description'], 'string', 'max' => 1000],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['executor_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'budget' => 'Budget',
            'creation_time' => 'Creation Time',
            'executor_id' => 'Executor ID',
            'task_id' => 'Task ID',
        ];
    }

    /**
     * Gets query for [[Executor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(Users::className(), ['id' => 'executor_id']);
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
