<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductSpecifications".
 *
 * @property integer $id
 * @property integer $productID
 * @property integer $productSpecificationTypeID
 * @property integer $productSpecificationValueInt
 * @property string $productSpecificationValueDecimal
 * @property integer $productSpecificationValueBit
 * @property integer $productSpecificationSelectionID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductSpecificationTypes $productSpecificationType
 * @property InvProducts $product
 */
class InvProductSpecifications extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductSpecifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productID'], 'required'],
            [['productID', 'productSpecificationTypeID', 'productSpecificationValueInt', 'productSpecificationValueBit', 'productSpecificationSelectionID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['productSpecificationValueDecimal'], 'number'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productSpecificationTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductSpecificationTypes::className(), 'targetAttribute' => ['productSpecificationTypeID' => 'id']],
            [['productID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProducts::className(), 'targetAttribute' => ['productID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productID' => 'Product ID',
            'productSpecificationTypeID' => 'Product Specification Type ID',
            'productSpecificationValueInt' => 'Product Specification Value Int',
            'productSpecificationValueDecimal' => 'Product Specification Value Decimal',
            'productSpecificationValueBit' => 'Product Specification Value Bit',
            'productSpecificationSelectionID' => 'Product Specification Selection ID',
            'active' => 'Active',
            'deleted' => 'Deleted',
            'createdTime' => 'Created Time',
            'modifiedTime' => 'Modified Time',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSpecificationType()
    {
        return $this->hasOne(InvProductSpecificationTypes::className(), ['id' => 'productSpecificationTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(InvProducts::className(), ['id' => 'productID']);
    }

    public function getSelection()
    {
        return $this->hasOne(InvProductSpecificationsSelections::className(), ['id' => 'productSpecificationSelectionID'])
                        ->alias('InvProductSpecificationsSelections')
                        ->OnCondition(['InvProductSpecificationsSelections.active' => 1, 'InvProductSpecificationsSelections.deleted' => 0]);
    }

    public function getType()
    {
        return $this->hasOne(InvProductSpecificationTypes::className(), ['id' => 'productSpecificationTypeID'])
//                ->select('productSpecificationName, isInt, isDecimal, isSelection, isBit');
                        ->alias('InvProductSpecificationTypes')
                        ->OnCondition(['InvProductSpecificationTypes.active' => 1, 'InvProductSpecificationTypes.deleted' => 0]);
    }

    public function getUnit()
    {
        return $this->hasOne(InvProductUnits::className(), ['id' => 'productUnitID'])->via('type');
    }

    public static function getSpecificationProducts($id)
    {
        return InvProductSpecifications::find()
                        ->alias('t')
                        ->where('productID=:productID AND t.active=1 AND t.deleted=0', [':productID' => $id])
                        ->joinWith([
                            'selection',
                            'type',
                            'unit'])
                        ->all();
    }

}
