<?php

namespace app\modules\intlog\models;

use Yii;

/**
 * This is the model class for table "adgroupmembers".
 *
 * @property int $id
 * @property string|null $adgroup
 * @property string|null $member
 * @property string|null $dt_time
 */
class Adgroupmembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adgroupmembers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['adgroup', 'member'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adgroup' => 'Adgroup',
            'member' => 'Member',
            'dt_time' => 'Dt Time',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdgroupmembersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdgroupmembersQuery(get_called_class());
    }

    public function getFolder(){
        return $this->hasOne(Intlogfolders::className(), ['adgroup' => 'adgroup']);
    }

    public function getUsersdirect(){
        return $this->hasOne(Users::className(), ['SamAccountName' => 'member']);

    }
}
