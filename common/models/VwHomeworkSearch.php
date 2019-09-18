<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VwHomework;

/**
 * VwHomeworkSearch represents the model behind the search form about `common\models\VwHomework`.
 */
class VwHomeworkSearch extends VwHomework
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'homeworkid', 'gender', 'phone', 'numcollegian', 'jobstatus', 'profilesid'], 'integer'],
            [['fname', 'lname', 'city', 'mobile', 'jobdetail', 'jobdescriotion', 'date_sent', 'hm_file', 'lessonname', 'majorname', 'gradename', 'uniname', 'username', 'term'], 'safe'],
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
        $query = VwHomework::find();

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
            'homeworkid' => $this->homeworkid,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'numcollegian' => $this->numcollegian,
            'jobstatus' => $this->jobstatus,
            'profilesid' => $this->profilesid,
            'date_sent' => $this->date_sent,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'jobdetail', $this->jobdetail])
            ->andFilterWhere(['like', 'jobdescriotion', $this->jobdescriotion])
            ->andFilterWhere(['like', 'hm_file', $this->hm_file])
            ->andFilterWhere(['like', 'lessonname', $this->lessonname])
            ->andFilterWhere(['like', 'majorname', $this->majorname])
            ->andFilterWhere(['like', 'gradename', $this->gradename])
            ->andFilterWhere(['like', 'uniname', $this->uniname])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'term', $this->term]);

        return $dataProvider;
    }
}
