<?php

namespace app\modules\intlog\models;

use Yii;

/**
 * This is the model class for table "rolemembers".
 *
 * @property int $id
 * @property string|null $role
 * @property string|null $memberSAM
 * @property string|null $dt_time
 */
class Rolemembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rolemembers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['role', 'memberSAM'], 'string', 'max' => 150],
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
            'memberSAM' => 'Member Sam',
            'dt_time' => 'Dt Time',
        ];
    }

    public function getUsers(){
        return $this->hasOne(Users::className(), ['SamAccountName' => 'memberSAM']);
    }
}
