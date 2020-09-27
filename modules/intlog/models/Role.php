<?php

namespace app\modules\intlog\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string|null $SamAccountName
 * @property string|null $ManagedBy
 * @property string|null $dt_time
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_time'], 'safe'],
            [['SamAccountName', 'ManagedBy'], 'string', 'max' => 150],
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
            'ManagedBy' => 'Managed By',
            'dt_time' => 'Dt Time',
        ];
    }

}
