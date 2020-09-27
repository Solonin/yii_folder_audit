<?php

namespace app\modules\intlog\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\intlog\models\Users;

/**
 * IntlogfoldersSearch represents the model behind the search form of `app\modules\intlog\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeNumber'], 'integer'],
            [['SamAccountName', 'PrimarySMTPAddress', 'name', 'extensionAttribute2', 'department', 'company', 'title', 'state', 'manager', 'dt_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Intlogfolders::find()->with('rolememberof')->groupBy(['folder']);
        $query = Users::find()->with('adgroupmembers')->with('rolemembers');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['extensionAttribute2'=>SORT_ASC],
            ],
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//            'extensionAttribute2' => $this->extensionAttribute2,
//            'dt_time' => $this->dt_time,
//        ]);

        $query->andFilterWhere(['like', 'extensionAttribute2', $this->extensionAttribute2])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'SamAccountName', $this->SamAccountName]);
//            ->andFilterWhere(['like', 'adgroup', $this->adgroup])
//            ->andFilterWhere(['like', 'ManagedBy', $this->ManagedBy])
//           // ->andFilterWhere(['like', 'role', $this->])
//            ->andFilterWhere(['like', 'permission', $this->permission]);

        return $dataProvider;
    }
}
