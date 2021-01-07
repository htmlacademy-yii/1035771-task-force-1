<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_files".
 *
 * @property int $id
 * @property int $file_id
 * @property int $user_id
 */
class UserFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['file_id'], 'integer', 'max' => 500],
            [['file_id', 'user_id'], 'unique', 'targetAttribute' => ['file_id', 'user_id']],
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
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Files]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['file_id' => 'id']);
    }

}
