<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UniHomework;

/**
 * UniHomeworkSearch represents the model behind the search form about `common\models\UniHomework`.
 */
class UniHomeworkSearch extends UniHomework
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'lesson_id', 'enteringyear_id', 'profiles_id'], 'integer'],
            [['hm_file', 'date_sent'], 'safe'],
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
        $query = UniHomework::find();

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
            'lesson_id' => $this->lesson_id,
            'date_sent' => $this->date_sent,
            'enteringyear_id' => $this->enteringyear_id,
            'profiles_id' => $this->profiles_id,
        ]);

        $query->andFilterWhere(['like', 'hm_file', $this->hm_file]);

        return $dataProvider;
    }
}
