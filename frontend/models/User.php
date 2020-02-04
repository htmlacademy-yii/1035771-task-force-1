<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $creation_time
 * @property string|null $birthday
 * @property string|null $info
 * @property string|null $avatar
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $other_contact
 * @property int $views
 * @property int $location_id
 * @property int $notification_new_message
 * @property int $notification_task_action
 * @property int $notification_review
 * @property int $show_for_customers
 *
 * @property Proposals[] $proposals
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'location_id'], 'required'],
            [['creation_time', 'birthday'], 'safe'],
            [['info'], 'string'],
            [['views', 'location_id', 'notification_new_message', 'notification_task_action', 'notification_review', 'show_for_customers'], 'integer'],
            [['name', 'email', 'password', 'phone', 'skype', 'other_contact'], 'string', 'max' => 128],
            [['avatar'], 'string', 'max' => 500],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'creation_time' => 'Creation Time',
            'birthday' => 'Birthday',
            'info' => 'Info',
            'avatar' => 'Avatar',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'other_contact' => 'Other Contact',
            'views' => 'Views',
            'location_id' => 'Location ID',
            'notification_new_message' => 'Notification New Message',
            'notification_task_action' => 'Notification Task Action',
            'notification_review' => 'Notification Review',
            'show_for_customers' => 'Show For Customers',
        ];
    }

    /**
     * Gets query for [[Proposals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProposals()
    {
        return $this->hasMany(Proposals::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['executor_id' => 'id']);
    }
}
