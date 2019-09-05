<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductDiscountDetails".
 *
 * @property integer $id
 * @property integer $ProductID
 * @property integer $fromCount
 * @property integer $toCount
 * @property integer $ProductDiscountID
 * @property integer $ProductPriceTypeID
 * @property integer $CustomerTypeID
 * @property double $discount
 * @property double $discountPercent
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactTypes $customerType
 * @property InvProductPriceTypes $productPriceType
 * @property InvProducts $product
 * @property InvProductDiscounts $productDiscount
 */
class InvProductDiscountDetails extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductDiscountDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductID', 'ProductDiscountID'], 'required'],
            [['ProductID', 'fromCount', 'toCount', 'ProductDiscountID', 'ProductPriceTypeID', 'CustomerTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['discount', 'discountPercent'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['CustomerTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContactTypes::className(), 'targetAttribute' => ['CustomerTypeID' => 'id']],
            [['ProductPriceTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductPriceTypes::className(), 'targetAttribute' => ['ProductPriceTypeID' => 'id']],
            [['ProductID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['ProductID' => 'id']],
            [['ProductDiscountID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductDiscounts::className(), 'targetAttribute' => ['ProductDiscountID' => 'id']],
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
            'fromCount' => 'From Count',
            'toCount' => 'To Count',
            'ProductDiscountID' => 'Product Discount ID',
            'ProductPriceTypeID' => 'Product Price Type ID',
            'CustomerTypeID' => 'Customer Type ID',
            'discount' => 'Discount',
            'discountPercent' => 'Discount Percent',
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
    public function getCustomerType()
    {
        return $this->hasOne(CrmContactTypes::className(), ['id' => 'CustomerTypeID']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getProductDiscount()
    {
        return $this->hasOne(InvProductDiscounts::className(), ['id' => 'ProductDiscountID']);
    }

    /**
     * @inheritdoc
     * @return InvProductDiscountDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductDiscountDetailsQuery(get_called_class());
    }

}
