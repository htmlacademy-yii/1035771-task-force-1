<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property string|null $creation_time
 * @property int $task_id
 * @property int $score
 * @property string $description
 *
 * @property Tasks $task
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creation_time'], 'safe'],
            [['task_id', 'score', 'description'], 'required'],
            [['task_id', 'score'], 'integer'],
            [['description'], 'string'],
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
            'creation_time' => 'Creation Time',
            'task_id' => 'Task ID',
            'score' => 'Score',
            'description' => 'Description',
        ];
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
