<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%notification}}".
 *
 * @property int $id
 * @property string $note
 * @property int $category_id
 * @property int $orders
 *
 * @property NotificationCategory $category
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%notification}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note'], 'string'],
            [['category_id'], 'required'],
            [['category_id', 'orders'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'note' => Yii::t('app', 'متن'),
            'category_id' => Yii::t('app', 'دسته بندی'),
            'orders' => Yii::t('app', 'الویت'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NotificationCategory::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return NotificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationQuery(get_called_class());
    }
}
