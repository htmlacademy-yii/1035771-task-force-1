<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string $city
 * @property float $lat
 * @property float $length
 * @property string|null $region
 * @property string|null $street
 * @property string|null $district
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'lat', 'length'], 'required'],
            [['lat', 'length'], 'number'],
            [['city'], 'string', 'max' => 64],
            [['region'], 'string', 'max' => 128],
            [['street', 'district'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'lat' => 'Lat',
            'length' => 'Length',
            'region' => 'Region',
            'street' => 'Street',
            'district' => 'District',
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['task_id' => 'id']);
    }
}
