<?php

namespace app\modules\cdc\models;

use Yii;

/**
 * This is the model class for table "cdcusers".
 *
 * @property int $id
 * @property string|null $SamAccountName
 * @property string|null $PrimarySMTPAddress
 * @property string|null $name
 * @property string|null $extensionAttribute2
 * @property string|null $department
 * @property string|null $company
 * @property string|null $title
 * @property string|null $state
 * @property string|null $manager
 * @property int|null $EmployeeNumber
 * @property string|null $dt_time
 */
class Cdcusers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdcusers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeNumber'], 'integer'],
            [['dt_time'], 'safe'],
            [['SamAccountName', 'PrimarySMTPAddress', 'name', 'extensionAttribute2', 'department', 'company', 'title', 'state', 'manager'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'SamAccountName' => 'Sam Account Name',
            'PrimarySMTPAddress' => 'Primary Smtp Address',
            'name' => 'Name',
            'extensionAttribute2' => 'Extension Attribute2',
            'department' => 'Department',
            'company' => 'Company',
            'title' => 'Title',
            'state' => 'State',
            'manager' => 'Manager',
            'EmployeeNumber' => 'Employee Number',
            'dt_time' => 'Dt Time',
        ];
    }
    public function getAdgroupmembers(){
        return $this->hasMany(Cdcadgroupmembers::className(), ['member' => 'SamAccountName']);
    }
}
