<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProductPriceDetails;

/**
 * InvProductPriceDetailsSearch represents the model behind the search form about `common\models\InvProductPriceDetails`.
 */
class InvProductPriceDetailsSearch extends InvProductPriceDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ProductID', 'ProductPriceID', 'ProductPriceTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['price'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
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
        $query = InvProductPriceDetails::find();

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
            'ProductID' => $this->ProductID,
            'ProductPriceID' => $this->ProductPriceID,
            'ProductPriceTypeID' => $this->ProductPriceTypeID,
            'price' => $this->price,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'createdTime' => $this->createdTime,
            'modifiedTime' => $this->modifiedTime,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
        ]);

        return $dataProvider;
    }
}
