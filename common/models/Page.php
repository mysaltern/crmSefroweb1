<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property string $desc
 * @property int $active
 * @property string $photo
 * @property int $time
 * @property int $category_writing
 *
 * @property CategoryWriting $categoryWriting
 */
class Page extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['active', 'time', 'category_writing'], 'integer'],
            [['title', 'photo'], 'string', 'max' => 255],
            [['summary'], 'string', 'max' => 512],
            [['category_writing'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryWriting::className(), 'targetAttribute' => ['category_writing' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'موضوع',
            'summary' => 'خلاصه',
            'desc' => 'توضیح',
            'active' => 'وضعیت',
            'photo' => 'عکس',
            'time' => 'زمان',
            'category_writing' => 'دسته بندی صفحات',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryWriting()
    {
        return $this->hasOne(CategoryWriting::className(), ['id' => 'category_writing']);
    }

    /**
     * {@inheritdoc}
     * @return PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }

}
