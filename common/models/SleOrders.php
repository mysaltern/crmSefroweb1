<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_Orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $contactID
 * @property integer $contactAddressID
 * @property integer $paymenttypeID
 * @property integer $paymentDetailID
 * @property string $trackCode
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 * @property string $externalOrderCode
 *
 *
 * @property SleOrderDetail[] $sleOrderDetails
 * @property CrmContacts $contact
 * @property User $user
 * @property CrmContactAddresses $contactAddress
 * @property GlbCenter $center
 * @property SlePaymentDetails $paymentDetail
 * @property SlePaymentTypes $paymenttype
 * @property SleOrderStatusHistory[] $sleOrderStatusHistories
 */
class SleOrders extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'contactID', 'contactAddressID', 'paymenttypeID', 'paymentDetailID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['trackCode', 'externalOrderCode'], 'string'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['contactID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContacts::className(), 'targetAttribute' => ['contactID' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['contactAddressID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContactAddresses::className(), 'targetAttribute' => ['contactAddressID' => 'id']],
            [['paymentDetailID'], 'exist', 'skipOnError' => true, 'targetClass' => SlePaymentDetails::className(), 'targetAttribute' => ['paymentDetailID' => 'id']],
            [['paymenttypeID'], 'exist', 'skipOnError' => true, 'targetClass' => SlePaymentTypes::className(), 'targetAttribute' => ['paymenttypeID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'کد کاربری',
            'contactID' => 'Contact ID',
            'contactAddressID' => 'Contact Address ID',
            'paymenttypeID' => 'Paymenttype ID',
            'paymentDetailID' => 'Payment Detail ID',
            'trackCode' => 'Track Code',
            'active' => 'وضعیت',
            'deleted' => 'Deleted',
            'createdTime' => 'تاریخ ایجاد',
            'modifiedTime' => 'Modified Time',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
            'externalOrderCode' => 'کد نرم افزار',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleOrderDetails()
    {
        return $this->hasMany(SleOrderDetail::className(), ['orderID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(CrmContacts::className(), ['id' => 'contactID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactAddress()
    {
        return $this->hasOne(CrmContactAddresses::className(), ['id' => 'contactAddressID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentDetail()
    {
        return $this->hasOne(SlePaymentDetails::className(), ['id' => 'paymentDetailID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymenttype()
    {
        return $this->hasOne(SlePaymentTypes::className(), ['id' => 'paymenttypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleOrderStatusHistories()
    {
        return $this->hasMany(SleOrderStatusHistory::className(), ['orderID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SleOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleOrdersQuery(get_called_class());
    }

    public function notActive()
    {

        $model = SleOrders::find()->where(['externalOrderCode' => NULL])->joinWith('contact')->asArray()->all();

        return $model;
    }

    public function lastOrder()
    {


        $model = SleOrders::find()->where(['externalOrderCode' => NULL])->joinWith('sleOrderStatusHistories')->joinWith('contact')->orderBy('id desc')->limit(25)->asArray()->all();

        return $model;
    }

    public function allOrder()
    {
        $model = SleOrders::find()->where(['deleted' => NULL])->count();

        return $model;
    }

    public function allOrderSend()
    {
        $model = SleOrders::find()->where(['externalOrderCode' => !NULL])->joinWith('sleOrderStatusHistories')->count();

        return $model;
    }

    public function allOrderNotView()
    {
        $model = SleOrderStatusHistory::find()->select(['COUNT({{orderID}}) AS ordersCount'])->groupBy(['orderID'])->count();

        $model2 = SleOrders::find()->where(['deleted' => 0])->count();

        return $model2 - $model;
    }

    public function allPending()
    {
        $model = SleOrderStatusHistory::find()->select(['COUNT({{orderID}}) AS ordersCount'])->groupBy(['orderID'])->count();

        $model2 = SleOrders::find()->where(['deleted' => 0])->count();

        return $model2 - $model;
    }

    public function orderWithDay($day = 0)
    {
        for ($i = 6; $i >= 0; $i--)
        {
            $startdate1 = date("Y-m-d", strtotime("-$i days"));
            $start = "$startdate1 00:00:00.000";
            $ent = "$startdate1 23:59:59.000";
            $query[] = SleOrders::find()->where(['between', 'createdTime', $start, $ent])->asArray()->count();
        }

        return $query;
    }

}
