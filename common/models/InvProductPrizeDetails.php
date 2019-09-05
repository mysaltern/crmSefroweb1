<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductPrizeDetails".
 *
 * @property integer $id
 * @property integer $productID
 * @property integer $customerTypeID
 * @property integer $productPrizeID
 * @property integer $fromCount
 * @property integer $toCount
 * @property integer $per
 * @property integer $prizeCount
 * @property integer $prizeProductID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductPrizes $productPrize
 * @property InvProducts $product
 * @property SleCustomerTypes $customerType
 */
class InvProductPrizeDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductPrizeDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'productID', 'productPrizeID', 'prizeProductID'], 'required'],
            [['id', 'productID', 'customerTypeID', 'productPrizeID', 'fromCount', 'toCount', 'per', 'prizeCount', 'prizeProductID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productPrizeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductPrizes::className(), 'targetAttribute' => ['productPrizeID' => 'id']],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['productID' => 'id']],
            [['customerTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomerTypes::className(), 'targetAttribute' => ['customerTypeID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productID' => 'Product ID',
            'customerTypeID' => 'Customer Type ID',
            'productPrizeID' => 'Product Prize ID',
            'fromCount' => 'From Count',
            'toCount' => 'To Count',
            'per' => 'Per',
            'prizeCount' => 'Prize Count',
            'prizeProductID' => 'Prize Product ID',
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
    public function getProductPrize()
    {
        return $this->hasOne(InvProductPrizes::className(), ['id' => 'productPrizeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(InvProducts::className(), ['id' => 'productID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerType()
    {
        return $this->hasOne(SleCustomerTypes::className(), ['id' => 'customerTypeID']);
    }

    /**
     * @inheritdoc
     * @return InvProductPrizeDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductPrizeDetailsQuery(get_called_class());
    }
}
