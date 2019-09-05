<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvProducts;

/**
 * InvProductsSearch represents the model behind the search form about `common\models\InvProducts`.
 */
class InvProductsSearch extends InvProducts
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invProductManufacturerID', 'invProductSupplierID', 'invProductSharedCodeID', 'invProductTypeID', 'invProductShapeID', 'invProductCategoryID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['code', 'name', 'summary', 'description', 'createdTime', 'modifiedTime'], 'safe'],
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
        $query = InvProducts::find();

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
            'invProductManufacturerID' => $this->invProductManufacturerID,
            'invProductSupplierID' => $this->invProductSupplierID,
            'invProductSharedCodeID' => $this->invProductSharedCodeID,
            'invProductTypeID' => $this->invProductTypeID,
            'invProductShapeID' => $this->invProductShapeID,
            'invProductCategoryID' => $this->invProductCategoryID,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'createdTime' => $this->createdTime,
            'modifiedTime' => $this->modifiedTime,
            'createdBy' => $this->createdBy,
            'modifiedBy' => $this->modifiedBy,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'summary', $this->summary])
                ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

}
