<?php

namespace app\modules\cdc\models;

use Yii;

/**
 * This is the model class for table "cdcadgroupmembers".
 *
 * @property int $id
 * @property string|null $adgroup
 * @property string|null $member
 * @property string|null $dt_time
 */
class Cdcadgroupmembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdcadgroupmembers';
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

    public function getUser(){
        return $this->hasOne(Cdcusers::className(), ['SamAccountName' => 'member']);
    }

    public function getFolder(){
        return $this->hasOne(Cdcfolders::className(), ['adgroup' => 'adgroup']);
    }
}
