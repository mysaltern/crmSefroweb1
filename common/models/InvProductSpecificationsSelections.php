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
 */
class InvProductSpecificationsSelections extends \yii\db\ActiveRecord
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
            'active' => 'Active',
            'deleted' => 'Deleted',
            'createdTime' => 'Created Time',
            'modifiedTime' => 'Modified Time',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
        ];
    }

}
