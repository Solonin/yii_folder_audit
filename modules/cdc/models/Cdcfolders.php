<?php

namespace app\modules\cdc\models;

use Yii;

/**
 * This is the model class for table "cdcfolders".
 *
 * @property int $id
 * @property string|null $folder
 * @property string|null $adgroup
 * @property string|null $permission
 * @property string|null $dt_time
 * @property string|null $ManagedBy
 */
class Cdcfolders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdcfolders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['folder', 'adgroup'], 'string', 'max' => 150],
            [['permission', 'ManagedBy'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'folder' => 'Папка',
            'adgroup' => 'Группа доступа',
            'permission' => 'Права',
            'dt_time' => 'Dt Time',
            'ManagedBy' => 'Managed By',
        ];
    }

    public function getMembers(){
        return $this->hasMany(Cdcadgroupmembers::className(), ['adgroup' => 'adgroup']);
    }
    public function getUser(){
        return $this->hasOne(Cdcusers::className(), ['SamAccountName' => 'member'])
            ->via('members');
    }
}
