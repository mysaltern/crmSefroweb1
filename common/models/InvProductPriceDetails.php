<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductPriceDetails".
 *
 * @property integer $id
 * @property integer $ProductID
 * @property integer $ProductPriceID
 * @property integer $ProductPriceTypeID
 * @property double $price
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductPrices $productPrice
 * @property InvProductPriceTypes $productPriceType
 * @property InvProducts $product
 */
class InvProductPriceDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductPriceDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductID', 'ProductPriceID'], 'required'],
            [['ProductID', 'ProductPriceID', 'ProductPriceTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['price'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['ProductPriceID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductPrices::className(), 'targetAttribute' => ['ProductPriceID' => 'id']],
            [['ProductPriceTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductPriceTypes::className(), 'targetAttribute' => ['ProductPriceTypeID' => 'id']],
            [['ProductID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['ProductID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ProductID' => 'Product ID',
            'ProductPriceID' => 'Product Price ID',
            'ProductPriceTypeID' => 'Product Price Type ID',
            'price' => 'Price',
            'active' => 'وضعیت',
            'deleted' => 'Deleted',
            'createdTime' => 'تاریخ ایجاد',
            'modifiedTime' => 'Modified Time',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPrice()
    {
        return $this->hasOne(InvProductPrices::className(), ['id' => 'ProductPriceID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPriceType()
    {
        return $this->hasOne(InvProductPriceTypes::className(), ['id' => 'ProductPriceTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(InvProducts::className(), ['id' => 'ProductID']);
    }

    /**
     * @inheritdoc
     * @return InvProductPriceDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductPriceDetailsQuery(get_called_class());
    }
}
