<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_CustomerTypes".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $priceTypeID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductPrizeDetails[] $invProductPrizeDetails
 * @property SleCustomer[] $sleCustomers
 * @property InvProductPriceTypes $priceType
 */
class SleCustomerTypes extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_CustomerTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['priceTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['priceTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductPriceTypes::className(), 'targetAttribute' => ['priceTypeID' => 'id']],
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
            'priceTypeID' => 'Price Type ID',
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
    public function getInvProductPrizeDetails()
    {
        return $this->hasMany(InvProductPrizeDetails::className(), ['customerTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleCustomers()
    {
        return $this->hasMany(SleCustomer::className(), ['customerTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceType()
    {
        return $this->hasOne(InvProductPriceTypes::className(), ['id' => 'priceTypeID']);
    }

    /**
     * @inheritdoc
     * @return SleCustomerTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleCustomerTypesQuery(get_called_class());
    }

}
