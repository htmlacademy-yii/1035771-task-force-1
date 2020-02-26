<?php

namespace frontend\models;

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
        return $this->hasMany(Proposal::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[TaskCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaskCustomer()
    {
        return $this->hasMany(Task::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[TasksExecutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasksExecutor()
    {
        return $this->hasMany(Task::className(), ['executor_id' => 'id']);
    }

    public function getCategories() {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->viaTable('users_categories', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Sender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasMany(UserMessage::className(), ['sender_id' => 'id']);
    }

    /**
     * Gets query for [[Recipient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient()
    {
        return $this->hasMany(UserMessage::className(), ['recipient_id' => 'id']);
    }

    public function getFiles() {
        return $this->hasMany(File::class, ['id' => 'file_id'])->viaTable('user_files', ['user_id' => 'id']);
    }

}
