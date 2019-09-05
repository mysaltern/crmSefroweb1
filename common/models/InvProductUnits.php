<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inv_ProductUnits".
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
 * @property InvProductPacking[] $invProductPackings
 * @property InvProductSpecificationTypes[] $invProductSpecificationTypes
 */
class InvProductUnits extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inv_ProductUnits';
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
            'id' => 'ID',
            'code' => 'کد',
            'name' => 'نام',
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
    public function getInvProductPackings()
    {
        return $this->hasMany(InvProductPacking::className(), ['productUnitID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductSpecificationTypes()
    {
        return $this->hasMany(InvProductSpecificationTypes::className(), ['productUnitID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InvProductUnitsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvProductUnitsQuery(get_called_class());
    }

}
