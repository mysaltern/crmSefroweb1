<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_OrderStatus".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $label
 * @property integer $priority
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property SleOrderStatusHistory[] $sleOrderStatusHistories
 */
class SleOrderStatus extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_OrderStatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'label'], 'string'],
            [['priority', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
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
            'priority' => 'Priority',
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
    public function getSleOrderStatusHistories()
    {
        return $this->hasMany(SleOrderStatusHistory::className(), ['orderStatusID' => 'id']);
    }

}
