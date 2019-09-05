<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "crm_Contacts".
 *
 * @property integer $id
 * @property string $code
 * @property string $title
 * @property string $fName
 * @property string $lName
 * @property integer $userID
 * @property integer $customerID
 * @property string $nationalCode
 * @property string $insuranceCode
 * @property integer $departmentID
 * @property integer $positionID
 * @property integer $contactTypeID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactAddresses[] $crmContactAddresses
 * @property CrmContactCallNumbers[] $crmContactCallNumbers
 * @property CrmContactTypes $contactType
 * @property CrmDepartments $department
 * @property CrmPositions $position
 * @property SleCustomer $customer
 * @property User $user
 * @property SleOrders[] $sleOrders
 */
class CrmContacts extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'crm_Contacts';

        }


    /**
     * @inheritdoc
     */
    public function rules()
        {
        return [
                [['code', 'title', 'fName', 'lName', 'nationalCode', 'insuranceCode'], 'string'],
                [['userID', 'customerID', 'departmentID', 'positionID', 'contactTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
                [['createdTime', 'modifiedTime'], 'safe'],
                [['contactTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmContactTypes::className(), 'targetAttribute' => ['contactTypeID' => 'id']],
                [['departmentID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmDepartments::className(), 'targetAttribute' => ['departmentID' => 'id']],
                [['positionID'], 'exist', 'skipOnError' => true, 'targetClass' => CrmPositions::className(), 'targetAttribute' => ['positionID' => 'id']],
                [['customerID'], 'exist', 'skipOnError' => true, 'targetClass' => SleCustomer::className(), 'targetAttribute' => ['customerID' => 'id']],
                [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userID' => 'id']],
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
            'title' => 'تیتر',
            'fName' => 'نام ',
            'lName' => 'نام خانوادگی',
            'userID' => 'کد کاربری',
            'customerID' => 'Customer ID',
            'nationalCode' => 'کد ملی',
            'insuranceCode' => 'Insurance Code',
            'departmentID' => 'Department ID',
            'positionID' => 'Position ID',
            'contactTypeID' => 'Contact Type ID',
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
    public function getCrmContactAddresses()
        {
        return $this->hasMany(CrmContactAddresses::className(), ['contactID' => 'id']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmContactCallNumbers()
        {
        return $this->hasMany(CrmContactCallNumbers::className(), ['contactID' => 'id']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactType()
        {
        return $this->hasOne(CrmContactTypes::className(), ['id' => 'contactTypeID']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
        {
        return $this->hasOne(CrmDepartments::className(), ['id' => 'departmentID']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
        {
        return $this->hasOne(CrmPositions::className(), ['id' => 'positionID']);

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
    public function getUser()
        {
        return $this->hasOne(User::className(), ['id' => 'userID']);

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleOrders()
        {
        return $this->hasMany(SleOrders::className(), ['contactID' => 'id']);

        }


    /**
     * @inheritdoc
     * @return CrmContactsQuery the active query used by this AR class.
     */
    public static function find()
        {
        return new CrmContactsQuery(get_called_class());

        }


    }

