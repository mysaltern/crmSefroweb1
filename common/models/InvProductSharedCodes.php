<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductSharedCodes".
 *
 * @property string $id
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 * @property string $code_shared
 * @property string $name
 *
 * @property InvProducts[] $invProducts
 */
class InvProductSharedCodes extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductSharedCodes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['code_shared', 'name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => ' کد اصلی',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حدف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
            'code_shared' => 'کد اختصاصی',
            'name' => 'نام',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProducts()
    {
        return $this->hasMany(InvProducts::className(), ['invProductSharedCodeID' => 'id']);
    }

}
