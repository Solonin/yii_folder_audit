<?php

namespace app\modules\intlog\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\intlog\models\Rolememberof;

/**
 * RolememberofSearch represents the model behind the search form of `app\modules\intlog\models\Rolememberof`.
 */
class RolememberofSearch extends Rolememberof
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['role', 'memberof', 'dt_time'], 'safe'],
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
        $query = Rolememberof::find()->with('role1');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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

        $query->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'memberof', $this->memberof]);

        return $dataProvider;
    }
}
