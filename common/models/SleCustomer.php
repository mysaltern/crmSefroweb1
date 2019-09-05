<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_Customer".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $name
 * @property string $nationalCode
 * @property string $economicalCode
 * @property integer $customerTypeID
 * @property integer $customerKindID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactAddresses[] $crmContactAddresses
 * @property CrmContactCallNumbers[] $crmContactCallNumbers
 * @property CrmContacts[] $crmContacts
 * @property SleCustomerTypes $customerType
 * @property SleCustomerKinds $customerKind
 */
class SleCustomer extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_Customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'title', 'name', 'nationalCode', 'economicalCode'], 'string'],
            [['customerTypeID', 'customerKindID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['customerTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomerTypes::className(), 'targetAttribute' => ['customerTypeID' => 'id']],
            [['customerKindID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomerKinds::className(), 'targetAttribute' => ['customerKindID' => 'id']],
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
            'title' => 'Title',
            'name' => 'نام',
            'nationalCode' => 'کد ملی',
            'economicalCode' => 'Economical Code',
            'customerTypeID' => 'Customer Type ID',
            'customerKindID' => 'Customer Kind ID',
            'active' => 'وضعیت',
//            'deleted' => 'Deleted',
//            'createdTime' => 'تاریخ ایجاد',
//            'modifiedTime' => 'Modified Time',
//            'createdBy' => 'Created By',
//            'modifiedBy' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmContactAddresses()
    {
        return $this->hasMany(CrmContactAddresses::className(), ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmContactCallNumbers()
    {
        return $this->hasMany(CrmContactCallNumbers::className(), ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmContacts()
    {
        return $this->hasMany(CrmContacts::className(), ['customerID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerType()
    {
        return $this->hasOne(SleCustomerTypes::className(), ['id' => 'customerTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerKind()
    {
        return $this->hasOne(SleCustomerKinds::className(), ['id' => 'customerKindID']);
    }

    /**
     * @inheritdoc
     * @return SleCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleCustomerQuery(get_called_class());
    }

}
