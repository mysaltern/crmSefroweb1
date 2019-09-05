<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductTypes".
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
 * @property InvProducts[] $invProducts
 */
class InvProductTypes extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductTypes';
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
            'id' => ' کد اصلی',
            'code' => 'کد',
            'name' => 'نوع محصول',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حدف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProducts()
    {
        return $this->hasMany(InvProducts::className(), ['invProductTypeID' => 'id']);
    }

}
