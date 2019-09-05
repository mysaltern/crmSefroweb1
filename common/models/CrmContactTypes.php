<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "crm_ContactTypes".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContacts[] $crmContacts
 * @property InvProductDiscountDetails[] $invProductDiscountDetails
 */
class CrmContactTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crm_ContactTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
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
            'code' => 'کد',
            'name' => 'نام',
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
    public function getCrmContacts()
    {
        return $this->hasMany(CrmContacts::className(), ['contactTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductDiscountDetails()
    {
        return $this->hasMany(InvProductDiscountDetails::className(), ['CustomerTypeID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CrmContactTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CrmContactTypesQuery(get_called_class());
    }
}
