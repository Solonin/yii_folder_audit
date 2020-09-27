<?php

namespace app\modules\intlog\models;

use Yii;

/**
 * This is the model class for table "rolememberof".
 *
 * @property int $id
 * @property string|null $role
 * @property string|null $memberof
 * @property string|null $dt_time
 */
class Rolememberof extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rolememberof';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['role'], 'string', 'max' => 50],
            [['memberof'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'memberof' => 'Memberof',
            'dt_time' => 'Dt Time',
        ];
    }

    public function getRole1(){
        return $this->hasOne(Role::className(), ['SamAccountName' => 'role']);
    }

    public function getRolemembers(){
        return $this->hasMany(Rolemembers::className(), ['role' => 'role']);
    }
    public function getUsers(){
        return $this->hasMany(Users::className(), ['SamAccountName' => 'memberSAM'])
            ->via('rolemembers');
    }

    public function getFolder1(){
        return $this->hasOne(Intlogfolders::className(), ['adgroup' => 'memberof']);
    }
}
