<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductPriceTypes".
 *
 * @property integer $id
 * @property integer $code
 * @property string $name
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductDiscountDetails[] $invProductDiscountDetails
 * @property InvProductPriceDetails[] $invProductPriceDetails
 * @property SleCustomerTypes[] $sleCustomerTypes
 */
class InvProductPriceTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductPriceTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['name'], 'string'],
            [['createdTime', 'modifiedTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'کد',
            'name' => 'نام',
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
    public function getInvProductDiscountDetails()
    {
        return $this->hasMany(InvProductDiscountDetails::className(), ['ProductPriceTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPriceDetails()
    {
        return $this->hasMany(InvProductPriceDetails::className(), ['ProductPriceTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleCustomerTypes()
    {
        return $this->hasMany(SleCustomerTypes::className(), ['priceTypeID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InvProductPriceTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductPriceTypesQuery(get_called_class());
    }
}
