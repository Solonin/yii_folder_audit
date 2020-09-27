<?php

namespace app\modules\intlog\models;

use Yii;

/**
 * This is the model class for table "intlogfolders".
 *
 * @property int $id
 * @property string|null $folder
 * @property string|null $adgroup
 * @property string|null $permission
 * @property string|null $dt_time
 */
class Intlogfolders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intlogfolders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['folder', 'adgroup', 'ManagedBy'], 'string', 'max' => 150],
            [['permission'], 'string', 'max' => 10],
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
            'ManagedBy' => 'Ответственный',
            'dt_time' => 'Dt Time',
        ];
    }
    public function getRolememberof(){
        return $this->hasMany(Rolememberof::className(), ['memberof' => 'adgroup']);
    }

    public function getRolemembers(){
        return $this->hasMany(Rolemembers::className(), ['role' => 'role'])
            ->via('rolememberof');
    }
    public function getUsers(){
        return $this->hasMany(Users::className(), ['SamAccountName' => 'memberSAM'])
            ->via('rolemembers');
    }

    public function getAdgroupmembers(){
        return $this->hasMany(Adgroupmembers::className(), ['adgroup' => 'adgroup']);
    }
    public function getUsersdirect(){
        return $this->hasOne(Users::className(), ['SamAccountName' => 'member'])
            ->via('adgroupmembers');
    }
}
