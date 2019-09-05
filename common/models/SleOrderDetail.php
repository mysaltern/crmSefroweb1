<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_OrderDetail".
 *
 * @property integer $id
 * @property integer $orderID
 * @property integer $productID
 * @property double $amountPrice
 * @property integer $countNumber
 * @property double $amountDiscount
 * @property double $amoutTax
 * @property double $finalAmonutPrice
 * @property integer $qtyPrize
 * @property integer $paymentTimeDays
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProducts $product
 * @property SleOrders $order
 */
class SleOrderDetail extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_OrderDetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'productID', 'countNumber', 'qtyPrize', 'paymentTimeDays', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['amountPrice', 'amountDiscount', 'amoutTax', 'finalAmonutPrice'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['productID' => 'id']],
            [['orderID'], 'exist', 'skipOnError' => true, 'targetClass' => SleOrders::className(), 'targetAttribute' => ['orderID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderID' => 'Order ID',
            'productID' => 'Product ID',
            'amountPrice' => 'Amount Price',
            'countNumber' => 'Count Number',
            'amountDiscount' => 'Amount Discount',
            'amoutTax' => 'Amout Tax',
            'finalAmonutPrice' => 'Final Amonut Price',
            'qtyPrize' => 'Qty Prize',
            'paymentTimeDays' => 'Payment Time Days',
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
    public function getProduct()
    {
        return $this->hasOne(InvProducts::className(), ['id' => 'productID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(SleOrders::className(), ['id' => 'orderID']);
    }

    /**
     * @inheritdoc
     * @return SleOrderDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleOrderDetailQuery(get_called_class());
    }

    public function getGlbImagesProduct()
    {
        return $this->hasOne(GlbImages::className(), ['sourceRealtedID' => 'id'])
                        ->andOnCondition(['glb_Images.imageTypeID' => 1, 'glb_Images.deleted' => 0, 'glb_Images.active' => 1])
                        ->via('product');
    }

}
