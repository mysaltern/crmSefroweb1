<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_CustomerKinds".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $isCompany
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property SleCustomer[] $sleCustomers
 */
class SleCustomerKinds extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_CustomerKinds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['isCompany', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
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
            'isCompany' => 'Is Company',
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
    public function getSleCustomers()
    {
        return $this->hasMany(SleCustomer::className(), ['customerKindID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SleCustomerKindsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleCustomerKindsQuery(get_called_class());
    }

}
