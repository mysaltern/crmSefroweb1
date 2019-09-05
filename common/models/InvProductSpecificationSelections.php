<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductSpecificationSelections".
 *
 * @property integer $id
 * @property string $selectionName
 * @property integer $productSpecificationTypeID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductSpecificationTypes $productSpecificationType
 */
class InvProductSpecificationSelections extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductSpecificationSelections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['selectionName'], 'string'],
            [['productSpecificationTypeID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['productSpecificationTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => InvProductSpecificationTypes::className(), 'targetAttribute' => ['productSpecificationTypeID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'selectionName' => 'Selection Name',
            'productSpecificationTypeID' => 'Product Specification Type ID',
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
    public function getProductSpecificationType()
    {
        return $this->hasOne(InvProductSpecificationTypes::className(), ['id' => 'productSpecificationTypeID']);
    }

    /**
     * @inheritdoc
     * @return InvProductSpecificationSelectionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductSpecificationSelectionsQuery(get_called_class());
    }

}
