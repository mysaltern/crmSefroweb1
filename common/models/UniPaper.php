<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%uni_paper}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $files
 * @property int $active
 */
class UniPaper extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%uni_paper}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['active'], 'integer'],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf '],
            [['title'], 'string', 'max' => 255],
            [['description', 'files'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'عنوان'),
            'description' => Yii::t('app', 'توضیحات'),
            'files' => Yii::t('app', 'فایل مقاله'),
            'active' => Yii::t('app', 'فعال/غیرفعال'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UniPaperQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniPaperQuery(get_called_class());
    }
}
