<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_PaymentDetails".
 *
 * @property integer $id
 * @property integer $paymentTypeID
 * @property integer $transcationNumber
 * @property integer $bankID
 * @property string $paymentTime
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property SleOrders[] $sleOrders
 */
class SlePaymentDetails extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_PaymentDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paymentTypeID', 'transcationNumber', 'bankID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['paymentTime', 'createdTime', 'modifiedTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paymentTypeID' => 'Payment Type ID',
            'transcationNumber' => 'Transcation Number',
            'bankID' => 'Bank ID',
            'paymentTime' => 'Payment Time',
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
        return $this->hasMany(SleOrders::className(), ['paymentDetailID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SlePaymentDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlePaymentDetailsQuery(get_called_class());
    }

}
