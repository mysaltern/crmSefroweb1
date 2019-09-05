<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProductPrizeDetails;

/**
 * InvProductPrizeDetailsSearch represents the model behind the search form about `common\models\InvProductPrizeDetails`.
 */
class InvProductPrizeDetailsSearch extends InvProductPrizeDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'productID', 'customerTypeID', 'productPrizeID', 'fromCount', 'toCount', 'per', 'prizeCount', 'prizeProductID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
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
        $query = InvProductPrizeDetails::find();

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
            'productID' => $this->productID,
            'customerTypeID' => $this->customerTypeID,
            'productPrizeID' => $this->productPrizeID,
            'fromCount' => $this->fromCount,
            'toCount' => $this->toCount,
            'per' => $this->per,
            'prizeCount' => $this->prizeCount,
            'prizeProductID' => $this->prizeProductID,
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
