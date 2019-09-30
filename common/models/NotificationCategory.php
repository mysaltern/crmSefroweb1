<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%notification_category}}".
 *
 * @property int $id
 * @property string $name
 */
class NotificationCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%notification_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return NotificationCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationCategoryQuery(get_called_class());
    }
}
