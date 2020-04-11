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
 * @property string $last_active_time
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
            [['creation_time', 'birthday', 'last_active_time'], 'safe'],
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
            'last_active_time' => 'Last Active Time',
        ];
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
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
     * Gets query for [[ReviewCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewCustomer()
    {
        return $this->hasMany(Review::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[ReviewExecutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewExecutor()
    {
        return $this->hasMany(Review::className(), ['executor_id' => 'id']);
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

    public function findByFilterForm($formUser) {

        $user = User::find()
            ->orderBy('users.creation_time DESC');

        foreach ($formUser as $key => $value) {
            if ($value) {
                switch ($key) {

                    case 'categories':
                        $user = $user->joinWith('categories')
                            ->andWhere([UserCategory::tableName().'.category_id' => $formUser->categories]);
                        break;

                    case 'review':
                        $user = $user->andWhere('users.views != 0');
                        break;

                    case 'online':
                        $user->andWhere(['>', 'users.last_active_time', date("Y-m-d H:i:s", strtotime("- 1 hour"))]);
                        break;

                    case 'free':
                        $user=$user->joinWith('tasksExecutor')
                            ->andWhere(['or',['tasks.id' => NULL], 'tasks.status = 1']);
                        break;

                    case 'search':
                        $user->andWhere(['LIKE', 'users.info', $value]);
                        break;
                }
            }
        }

    return $user->all();
    }
}
