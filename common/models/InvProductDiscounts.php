<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductDiscounts".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $execTime
 * @property string $expirationTime
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductDiscountDetails[] $invProductDiscountDetails
 */
class InvProductDiscounts extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductDiscounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['name'], 'required'],
            [['execTime', 'expirationTime', 'createdTime', 'modifiedTime'], 'safe'],
            [['active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
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
            'execTime' => 'Exec Time',
            'expirationTime' => 'Expiration Time',
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
    public function getInvProductDiscountDetails()
    {
        return $this->hasMany(InvProductDiscountDetails::className(), ['ProductDiscountID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InvProductDiscountsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductDiscountsQuery(get_called_class());
    }

}
