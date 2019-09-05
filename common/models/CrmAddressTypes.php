<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "crm_AddressTypes".
 *
 * @property integer $id
 * @property string $addressType
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactAddresses[] $crmContactAddresses
 */
class CrmAddressTypes extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'crm_AddressTypes';

        }


    /**
     * @inheritdoc
     */
    public function rules()
        {
        return [
                [['addressType'], 'string'],
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
            'addressType' => 'نوع آدرس',
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
        return $this->hasMany(CrmContactAddresses::className(), ['addressTypeID' => 'id']);

        }


    /**
     * @inheritdoc
     * @return CrmAddressTypesQuery the active query used by this AR class.
     */
    public static function find()
        {
        return new CrmAddressTypesQuery(get_called_class());

        }


    }

