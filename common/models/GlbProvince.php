<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "glb_Province".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $countryID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property GlbCity[] $glbCities
 * @property GlbCountry $country
 */
class GlbProvince extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glb_Province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string'],
            [['countryID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['countryID'], 'exist', 'skipOnError' => true, 'targetClass' => GlbCountry::className(), 'targetAttribute' => ['countryID' => 'id']],
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
            'countryID' => 'Country ID',
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
    public function getGlbCities()
    {
        return $this->hasMany(GlbCity::className(), ['provinceID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(GlbCountry::className(), ['id' => 'countryID']);
    }

    /**
     * @inheritdoc
     * @return GlbProvinceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GlbProvinceQuery(get_called_class());
    }

}
