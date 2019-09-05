<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_lesson".
 *
 * @property int $id
 * @property string $name
 *
 * @property UniReference[] $uniReferences
 */
class UniLesson extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام درس',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniReferences()
    {
        return $this->hasMany(UniReference::className(), ['lesson_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniLessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniLessonQuery(get_called_class());
    }

}
