<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "crm_ContactCallNumbers".
 *
 * @property integer $id
 * @property integer $contactID
 * @property integer $customerID
 * @property integer $callNumberType
 * @property string $numberDesc
 * @property string $callNumber
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmCallNumberTypes $callNumberType0
 * @property CrmContacts $contact
 * @property SleCustomer $customer
 */
class CrmContactCallNumbers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crm_ContactCallNumbers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contactID', 'customerID', 'callNumberType', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['numberDesc', 'callNumber'], 'string'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['callNumberType'], 'exist', 'skipOnError' => true, 'targetClass' => CrmCallNumberTypes::className(), 'targetAttribute' => ['callNumberType' => 'id']],
            [['contactID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContacts::className(), 'targetAttribute' => ['contactID' => 'id']],
            [['customerID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomer::className(), 'targetAttribute' => ['customerID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contactID' => 'Contact ID',
            'customerID' => 'Customer ID',
            'callNumberType' => 'Call Number Type',
            'numberDesc' => 'Number Desc',
            'callNumber' => 'Call Number',
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
    public function getCallNumberType0()
    {
        return $this->hasOne(CrmCallNumberTypes::className(), ['id' => 'callNumberType']);
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
    public function getCustomer()
    {
        return $this->hasOne(SleCustomer::className(), ['id' => 'customerID']);
    }

    /**
     * @inheritdoc
     * @return CrmContactCallNumbersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CrmContactCallNumbersQuery(get_called_class());
    }
}
