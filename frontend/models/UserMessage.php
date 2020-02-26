<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_messages".
 *
 * @property int $id
 * @property int $viewed
 * @property int $sender_id
 * @property int $recipient_id
 * @property string $description
 * @property int $task_id
 * @property string|null $creation_time
 *
 * @property Tasks $task
 */
class UserMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['viewed', 'sender_id', 'recipient_id', 'task_id'], 'integer'],
            [['sender_id', 'recipient_id', 'description', 'task_id'], 'required'],
            [['description'], 'string'],
            [['creation_time'], 'safe'],
            [['sender_id', 'recipient_id'], 'unique', 'targetAttribute' => ['sender_id', 'recipient_id']],
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
            'viewed' => 'Viewed',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
            'description' => 'Description',
            'task_id' => 'Task ID',
            'creation_time' => 'Creation Time',
        ];
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(User::className(), ['id' => 'sender_id']);
    }

    /**
     * Gets query for [[Recipient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient()
    {
        return $this->hasOne(User::className(), ['id' => 'recipient_id']);
    }
}
