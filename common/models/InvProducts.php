<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_products".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $invProductManufacturerID
 * @property integer $invProductSupplierID
 * @property string $invProductSharedCodeID
 * @property integer $invProductTypeID
 * @property integer $invProductShapeID
 * @property integer $invProductCategoryID
 * @property string $summary
 * @property string $description
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 * @property string $photo
 *
 * @property InvProductCategoryRel[] $invProductCategoryRels
 * @property InvProductDiscountDetails[] $invProductDiscountDetails
 * @property InvProductPacking[] $invProductPackings
 * @property InvProductPriceDetails[] $invProductPriceDetails
 * @property InvProductPrizeDetails[] $invProductPrizeDetails
 * @property InvProductTypes $invProductType
 * @property InvProductSuppliers $invProductSupplier
 * @property InvProductManufacturers $invProductManufacturer
 * @property InvProductSharedCodes $invProductSharedCode
 * @property InvProductCategories $invProductCategory
 * @property InvProductShapes $invProductShape
 * @property InvProductSpecifications[] $invProductSpecifications
 * @property SleCartDetail[] $sleCartDetails
 */
class InvProducts extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code', 'name', 'summary', 'photo', 'description'], 'string'],
            [['invProductManufacturerID', 'invProductSupplierID', 'invProductSharedCodeID', 'invProductTypeID', 'invProductShapeID', 'invProductCategoryID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['invProductTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductTypes::className(), 'targetAttribute' => ['invProductTypeID' => 'id']],
            [['invProductSupplierID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductSuppliers::className(), 'targetAttribute' => ['invProductSupplierID' => 'id']],
            [['invProductManufacturerID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductManufacturers::className(), 'targetAttribute' => ['invProductManufacturerID' => 'id']],
            [['invProductSharedCodeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductSharedCodes::className(), 'targetAttribute' => ['invProductSharedCodeID' => 'id']],
            [['invProductCategoryID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductCategories::className(), 'targetAttribute' => ['invProductCategoryID' => 'id']],
            [['invProductShapeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductShapes::className(), 'targetAttribute' => ['invProductShapeID' => 'id']],
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
            'file' => 'عکس',
            'name' => 'نام محصول',
            'invProductManufacturerID' => 'نام تولید کننده',
            'invProductSupplierID' => 'نام تامین کننده',
            'invProductSharedCodeID' => 'کد مشترک محصول',
            'invProductTypeID' => 'نوع محصول',
            'invProductShapeID' => 'شکل محصول',
            'invProductCategoryID' => 'دسته ی محصول',
            'summary' => 'خلاصه ی توضیحات',
            'description' => 'توضیحات کامل',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حذف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductCategoryRels()
    {
        return $this->hasMany(InvProductCategoryRel::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductDiscountDetails()
    {
        return $this->hasMany(InvProductDiscountDetails::className(), ['ProductID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPackings()
    {
        return $this->hasMany(InvProductPacking::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPriceDetails()
    {
        return $this->hasMany(InvProductPriceDetails::className(), ['ProductID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPrizeDetails()
    {
        return $this->hasMany(InvProductPrizeDetails::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductType()
    {
        return $this->hasOne(InvProductTypes::className(), ['id' => 'invProductTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductSupplier()
    {
        return $this->hasOne(InvProductSuppliers::className(), ['id' => 'invProductSupplierID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductManufacturer()
    {
        return $this->hasOne(InvProductManufacturers::className(), ['id' => 'invProductManufacturerID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductSharedCode()
    {
        return $this->hasOne(InvProductSharedCodes::className(), ['id' => 'invProductSharedCodeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductCategory()
    {
        return $this->hasOne(InvProductCategories::className(), ['id' => 'invProductCategoryID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductShape()
    {
        return $this->hasOne(InvProductShapes::className(), ['id' => 'invProductShapeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductSpecifications()
    {
        return $this->hasMany(InvProductSpecifications::className(), ['productID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleCartDetails()
    {
        return $this->hasMany(SleCartDetail::className(), ['productID' => 'id']);
    }

}
