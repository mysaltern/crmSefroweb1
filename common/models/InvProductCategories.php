<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductCategories".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $parentID
 * @property integer $levelno
 * @property integer $position
 * @property integer $imageID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property GlbImages $image
 * @property InvProductCategoryRel[] $invProductCategoryRels
 * @property InvProducts[] $invProducts
 * @property Navigation[] $navigations
 */
class InvProductCategories extends \yii\db\ActiveRecord
{

    public $level2;
    public $level3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_productcategories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['name'], 'required'],
            [['parentID', 'levelno', 'position', 'imageID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['imageID'], 'exist', 'skipOnError' => true, 'targetClass' => GlbImages::className(), 'targetAttribute' => ['imageID' => 'id']],
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
            'name' => 'نام',
            'parentID' => 'نام شاخه',
            'levelno' => 'سطح',
            'position' => 'ترتیب',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حدف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
            'imageID' => 'Image ID',
        ];
    }

    public function getLastLevel()
    {
        $connection = \Yii::$app->db;
        $last_level = $connection->createCommand('select id,name,parentID from inv_ProductCategories WHERE id not in (SELECT inv_ProductCategories.parentID FROM  inv_ProductCategories WHERE parentID is not NULL ) ')->queryAll();
        return $last_level;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(GlbImages::className(), ['id' => 'imageID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductCategoryRels()
    {
        return $this->hasMany(InvProductCategoryRel::className(), ['productCategoryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProducts()
    {
        return $this->hasMany(InvProducts::className(), ['invProductCategoryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNavigations()
    {
        return $this->hasMany(Navigation::className(), ['categoryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(InvProductCategories::className(), ['id' => 'parentID'])->alias('parent');
    }

    /**
     * @inheritdoc
     * @return InvProductCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductCategoriesQuery(get_called_class());
    }

}
