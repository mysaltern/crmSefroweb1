<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "glb_City".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $provinceID
 * @property integer $centerID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactAddresses[] $crmContactAddresses
 * @property GlbProvince $province
 */
class GlbCity extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glb_City';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['provinceID', 'centerID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['provinceID'], 'exist', 'skipOnError' => true, 'targetClass' => GlbProvince::className(), 'targetAttribute' => ['provinceID' => 'id']],
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
            'provinceID' => 'Province ID',
            'centerID' => 'Center ID',
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
    public function getCrmContactAddresses()
    {
        return $this->hasMany(CrmContactAddresses::className(), ['cityID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(GlbProvince::className(), ['id' => 'provinceID']);
    }

    /**
     * @inheritdoc
     * @return GlbCityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GlbCityQuery(get_called_class());
    }

}
