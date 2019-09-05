<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductSpecificationTypes".
 *
 * @property integer $id
 * @property string $productSpecificationName
 * @property integer $productUnitID
 * @property integer $isInt
 * @property integer $isDecimal
 * @property integer $isSelection
 * @property integer $isBit
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductSpecifications[] $invProductSpecifications
 * @property InvProductUnits $productUnit
 */
class InvProductSpecificationTypes extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductSpecificationTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productSpecificationName'], 'string'],
            [['productUnitID', 'isInt', 'isDecimal', 'isSelection', 'isBit', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productUnitID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductUnits::className(), 'targetAttribute' => ['productUnitID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productSpecificationName' => 'نام ویژگی',
            'productUnitID' => 'Product Unit ID',
            'isInt' => 'Is Int',
            'isDecimal' => 'Is Decimal',
            'isSelection' => 'Is Selection',
            'isBit' => 'Is Bit',
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
    public function getInvProductSpecifications()
    {
        return $this->hasMany(InvProductSpecifications::className(), ['productSpecificationTypeID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUnit()
    {
        return $this->hasOne(InvProductUnits::className(), ['id' => 'productUnitID']);
    }

    /**
     * @inheritdoc
     * @return InvProductSpecificationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductSpecificationTypesQuery(get_called_class());
    }

}
