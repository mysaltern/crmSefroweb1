<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_CartDetail".
 *
 * @property integer $id
 * @property integer $cartID
 * @property integer $productID
 * @property integer $countNumber
 * @property double $price
 * @property double $discount
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProducts $product
 * @property SleCart $cart
 */
class SleCartDetail extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_CartDetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cartID', 'productID', 'countNumber', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['price', 'discount'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['productID' => 'id']],
            [['cartID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCart::className(), 'targetAttribute' => ['cartID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartID' => 'Cart ID',
            'productID' => 'Product ID',
            'countNumber' => 'Count Number',
            'price' => 'Price',
            'discount' => 'Discount',
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
    public function getCart()
    {
        return $this->hasOne(SleCart::className(), ['id' => 'cartID']);
    }

    /**
     * @inheritdoc
     * @return SleCartDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleCartDetailQuery(get_called_class());
    }

}
