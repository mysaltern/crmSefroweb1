<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SleCustomer;

/**
 * SleCustomerSearch represents the model behind the search form about `common\models\SleCustomer`.
 */
class SleCustomerSearch extends SleCustomer
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customerTypeID', 'customerKindID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['code', 'title', 'name', 'nationalCode', 'economicalCode', 'createdTime', 'modifiedTime'], 'safe'],
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
     * Creates data provider instance with search query commonlied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SleCustomer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'customerTypeID' => $this->customerTypeID,
            'customerKindID' => $this->customerKindID,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'createdTime' => $this->createdTime,
            'modifiedTime' => $this->modifiedTime,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'nationalCode', $this->nationalCode])
                ->andFilterWhere(['like', 'economicalCode', $this->economicalCode]);

        return $dataProvider;
    }

}
