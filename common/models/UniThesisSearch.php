<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UniThesis;

/**
 * UniThesisSearch represents the model behind the search form about `common\models\UniThesis`.
 */
class UniThesisSearch extends UniThesis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'date_defense', 'grade_id', 'uni_id', 'major_id'], 'integer'],
            [['issue', 'url', 'feild1'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = UniThesis::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date_defense' => $this->date_defense,
            'grade_id' => $this->grade_id,
            'uni_id' => $this->uni_id,
            'major_id' => $this->major_id,
        ]);

        $query->andFilterWhere(['like', 'issue', $this->issue])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'feild1', $this->feild1]);

        return $dataProvider;
    }
}
