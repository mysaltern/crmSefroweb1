<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_productmanufacturers".
 *
 * @property integer $id
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 * @property string $code
 * @property string $name
 *
 * @property InvProducts[] $invProducts
 */
class InvProductManufacturers extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_productmanufacturers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['code', 'name'], 'string'],
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
            'code' => 'کد',
            'name' => 'نام تولید کننده',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProducts()
    {
        return $this->hasMany(InvProducts::className(), ['invProductManufacturerID' => 'id']);
    }

}
