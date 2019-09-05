<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SleOrderDetail;

/**
 * SleOrderDetailSearch represents the model behind the search form about `common\models\SleOrderDetail`.
 */
class SleOrderDetailSearch extends SleOrderDetail
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'orderID', 'productID', 'countNumber', 'qtyPrize', 'paymentTimeDays', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['amountPrice', 'amountDiscount', 'amoutTax', 'finalAmonutPrice'], 'number'],
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
     * Creates data provider instance with search query commonlied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SleOrderDetail::find();

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
            'orderID' => $this->orderID,
            'productID' => $this->productID,
            'amountPrice' => $this->amountPrice,
            'countNumber' => $this->countNumber,
            'amountDiscount' => $this->amountDiscount,
            'amoutTax' => $this->amoutTax,
            'finalAmonutPrice' => $this->finalAmonutPrice,
            'qtyPrize' => $this->qtyPrize,
            'paymentTimeDays' => $this->paymentTimeDays,
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
