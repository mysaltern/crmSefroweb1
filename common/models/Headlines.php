<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%headlines}}".
 *
 * @property int $id
 * @property string $name
 * @property int $lesson_id
 *
 * @property UniLesson $lesson
 */
class Headlines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%headlines}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniLesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'lesson_id' => Yii::t('app', 'Lesson ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(UniLesson::className(), ['id' => 'lesson_id']);
    }

    /**
     * {@inheritdoc}
     * @return HeadlinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HeadlinesQuery(get_called_class());
    }
}
