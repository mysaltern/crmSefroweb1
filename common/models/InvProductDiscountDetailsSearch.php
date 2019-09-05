<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProductDiscountDetails;

/**
 * InvProductDiscountDetailsSearch represents the model behind the search form about `app\models\InvProductDiscountDetails`.
 */
class InvProductDiscountDetailsSearch extends InvProductDiscountDetails
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ProductID', 'fromCount', 'toCount', 'ProductDiscountID', 'ProductPriceTypeID', 'CustomerTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['discount', 'discountPercent'], 'number'],
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
        $query = InvProductDiscountDetails::find();

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
            'ProductID' => $this->ProductID,
            'fromCount' => $this->fromCount,
            'toCount' => $this->toCount,
            'ProductDiscountID' => $this->ProductDiscountID,
            'ProductPriceTypeID' => $this->ProductPriceTypeID,
            'CustomerTypeID' => $this->CustomerTypeID,
            'discount' => $this->discount,
            'discountPercent' => $this->discountPercent,
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
