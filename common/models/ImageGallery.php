<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_gallery}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $orders
 * @property int $active
 */
class ImageGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%image_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['name'], 'required'],
            [['name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg , jpeg'],
            [['description'], 'string'],
            [['orders', 'active'], 'integer'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'تصویر'),
            'description' => Yii::t('app', 'توضیحات'),
            'orders' => Yii::t('app', 'الویت'),
            'active' => Yii::t('app', 'فعالیت'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ImageGalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageGalleryQuery(get_called_class());
    }
}
