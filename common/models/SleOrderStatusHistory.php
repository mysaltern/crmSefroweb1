<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_OrderStatusHistory".
 *
 * @property integer $id
 * @property integer $orderID
 * @property integer $orderStatusID
 * @property string $orderStatusChangeTime
 * @property integer $statusContactID
 * @property string $orderStatusDesc
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContacts $statusContact
 * @property SleOrders $order
 * @property SleOrderStatus $orderStatus
 */
class SleOrderStatusHistory extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_OrderStatusHistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'orderStatusID', 'statusContactID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['orderStatusChangeTime', 'createdTime', 'modifiedTime'], 'safe'],
            [['orderStatusDesc'], 'string'],
            [['statusContactID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContacts::className(), 'targetAttribute' => ['statusContactID' => 'id']],
            [['orderID'], 'exist', 'skipOnError' => true, 'targetClass' => SleOrders::className(), 'targetAttribute' => ['orderID' => 'id']],
            [['orderStatusID'], 'exist', 'skipOnError' => true, 'targetClass' => SleOrderStatus::className(), 'targetAttribute' => ['orderStatusID' => 'id']],
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
            'orderStatusID' => 'Order Status ID',
            'orderStatusChangeTime' => 'Order Status Change Time',
            'statusContactID' => 'Status Contact ID',
            'orderStatusDesc' => 'Order Status Desc',
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
    public function getStatusContact()
    {
        return $this->hasOne(CrmContacts::className(), ['id' => 'statusContactID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(SleOrders::className(), ['id' => 'orderID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatus()
    {
        return $this->hasOne(SleOrderStatus::className(), ['id' => 'orderStatusID']);
    }

    public function adding($idOrder, $idUser, $status)
    {

//        $rows = (new \yii\db\Query())
//                ->select(['id'])
//                ->from('sle_OrderStatusHistory')
//                ->where(['orderID' => "$idOrder"])
//                ->one();
//
//        if (isset($rows['id']))
//            {
//            $connection = \Yii::$common->db;
//            $connection->createCommand()
//                    ->update('sle_OrderStatusHistory', ['modifiedTime' => date('Y-m-d H:i:s.u'), 'modifiedBy' => $idUser], "orderID = $idOrder")
//                    ->execute();
//            }
//        else
//            {
        $model = new \common\models\SleOrderStatusHistory;
        $model->active = 1;
        $model->createdBy = $idUser;
        $model->createdTime = date('Y-m-d H:i:s.u');
        $model->orderID = $idOrder;
        $model->orderStatusID = $status;
        $model->statusContactID = Yii::$app->mycomponent->getContactID($idUser);
        $model->save(false);
//            }
    }

    public function modify($idOrder, $userID, $status)
    {




        $connection = \Yii::$common->db;
        $connection->createCommand()
                ->update('sle_OrderStatusHistory', ['modifiedTime' => date('Y-m-d H:i:s.u'), 'modifiedBy' => $userID, 'orderStatusID' => $status], "orderID = $idOrder")
                ->execute();
    }

    /**
     * @inheritdoc
     * @return SleOrderStatusHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleOrderStatusHistoryQuery(get_called_class());
    }

}
