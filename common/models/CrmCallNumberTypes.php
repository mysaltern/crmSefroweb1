<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "crm_CallNumberTypes".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property CrmContactCallNumbers[] $crmContactCallNumbers
 */
class CrmCallNumberTypes extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'crm_CallNumberTypes';

        }


    /**
     * @inheritdoc
     */
    public function rules()
        {
        return [
                [['name'], 'string'],
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
    public function getCrmContactCallNumbers()
        {
        return $this->hasMany(CrmContactCallNumbers::className(), ['callNumberType' => 'id']);

        }


    /**
     * @inheritdoc
     * @return CrmCallNumberTypesQuery the active query used by this AR class.
     */
    public static function find()
        {
        return new CrmCallNumberTypesQuery(get_called_class());

        }


    }

