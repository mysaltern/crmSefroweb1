<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProductSuppliers;

/**
 * InvProductSuppliersSearch represents the model behind the search form about `common\models\InvProductSuppliers`.
 */
class InvProductSuppliersSearch extends InvProductSuppliers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createdBy', 'modifiedBy'], 'integer'],
            [['code', 'name', 'active', 'deleted', 'createdTime', 'modifiedTime'], 'safe'],
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
        $query = InvProductSuppliers::find();

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
            'createdTime' => $this->createdTime,
            'modifiedTime' => $this->modifiedTime,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
