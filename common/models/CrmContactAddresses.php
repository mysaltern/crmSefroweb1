<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "crm_ContactAddresses".
 *
 * @property integer $id
 * @property integer $addressTypeID
 * @property string $addressDesc
 * @property string $postalCode
 * @property integer $contactID
 * @property integer $customerID
 * @property integer $cityID
 * @property string $address
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmAddressTypes $addressType
 * @property CrmContacts $contact
 * @property SleCustomer $customer
 * @property GlbCity $city
 * @property SleOrders[] $sleOrders
 */
class CrmContactAddresses extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'crm_ContactAddresses';

        }


    /**
     * @inheritdoc
     */
    public function rules()
        {
        return [
                [['addressTypeID', 'contactID', 'customerID', 'cityID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
                [['addressDesc', 'postalCode', 'address'], 'string'],
                [['createdTime', 'modifiedTime'], 'safe'],
                [['addressTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmAddressTypes::className(), 'targetAttribute' => ['addressTypeID' => 'id']],
                [['contactID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContacts::className(), 'targetAttribute' => ['contactID' => 'id']],
                [['customerID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomer::className(), 'targetAttribute' => ['customerID' => 'id']],
                [['cityID'], 'exist', 'skipOnError' => true, 'targetClass' => GlbCity::className(), 'targetAttribute' => ['cityID' => 'id']],
        ];

        }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
        {
        return [
            'id' => 'ID',
            'addressTypeID' => 'Address Type ID',
            'addressDesc' => 'آدرس کامل',
            'postalCode' => 'Postal Code',
            'contactID' => 'Contact ID',
            'customerID' => 'Customer ID',
            'cityID' => 'City ID',
            'address' => 'آدرس',
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
    public function getAddressType()
        {
        return $this->hasOne(CrmAddressTypes::className(), ['id' => 'addressTypeID']);

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
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
        {
        return $this->hasOne(GlbCity::className(), ['id' => 'cityID']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleOrders()
        {
        return $this->hasMany(SleOrders::className(), ['contactAddressID' => 'id']);

        }


    /**
     * @inheritdoc
     * @return CrmContactAddressesQuery the active query used by this AR class.
     */
    public static function find()
        {
        return new CrmContactAddressesQuery(get_called_class());

        }


    }

