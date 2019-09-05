<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProductSpecificationTypes;

/**
 * InvProductSpecificationTypesSearch represents the model behind the search form about `app\models\InvProductSpecificationTypes`.
 */
class InvProductSpecificationTypesSearch extends InvProductSpecificationTypes
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'productUnitID', 'isInt', 'isDecimal', 'isSelection', 'isBit', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['productSpecificationName', 'createdTime', 'modifiedTime'], 'safe'],
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
        $query = InvProductSpecificationTypes::find();

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
            'productUnitID' => $this->productUnitID,
            'isInt' => $this->isInt,
            'isDecimal' => $this->isDecimal,
            'isSelection' => $this->isSelection,
            'isBit' => $this->isBit,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'createdTime' => $this->createdTime,
            'modifiedTime' => $this->modifiedTime,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
        ]);

        $query->andFilterWhere(['like', 'productSpecificationName', $this->productSpecificationName]);

        return $dataProvider;
    }

}
