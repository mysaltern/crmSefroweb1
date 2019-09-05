<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_PaymentTypes".
 *
 * @property integer $id
 * @property string $paymentTypeName
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property SleOrders[] $sleOrders
 */
class SlePaymentTypes extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_PaymentTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paymentTypeName'], 'string'],
            [['active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
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
            'paymentTypeName' => 'Payment Type Name',
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
    public function getSleOrders()
    {
        return $this->hasMany(SleOrders::className(), ['paymenttypeID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SlePaymentTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlePaymentTypesQuery(get_called_class());
    }

}
