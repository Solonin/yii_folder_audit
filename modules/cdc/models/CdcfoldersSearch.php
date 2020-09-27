<?php

namespace app\modules\cdc\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\cdc\models\Cdcfolders;

/**
 * CdcfoldersSearch represents the model behind the search form of `app\modules\cdcfolders\models\Cdcfolders`.
 */
class CdcfoldersSearch extends Cdcfolders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['folder', 'adgroup', 'permission', 'dt_time', 'ManagedBy'], 'safe'],
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
        $query = Cdcfolders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['folder'=>SORT_ASC],
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
        $query->andFilterWhere([
            'id' => $this->id,
            'dt_time' => $this->dt_time,
        ]);

        $query->andFilterWhere(['like', 'folder', $this->folder])
            ->andFilterWhere(['like', 'adgroup', $this->adgroup])
            ->andFilterWhere(['like', 'permission', $this->permission])
            ->andFilterWhere(['like', 'ManagedBy', $this->ManagedBy]);

        return $dataProvider;
    }
}
