<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_reference".
 *
 * @property int $id
 * @property string $subject
 * @property int $lesson_id
 * @property int $major_id
 * @property string $url
 * @property int $active
 *
 * @property UniLesson $lesson
 * @property UniMajor $major
 */
class UniReference extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_reference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'major_id', 'active'], 'integer'],
            [['subject', 'url'], 'string', 'max' => 255],
            [['url'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf , rar , zip'],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniLesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
            [['major_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniMajor::className(), 'targetAttribute' => ['major_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'نام',
            'lesson_id' => 'نام درس',
            'major_id' => 'نام رشته',
            'url' => 'آدرس',
            'active' => 'وضعیت',
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
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(UniMajor::className(), ['id' => 'major_id']);
    }

    /**
     * {@inheritdoc}
     * @return UniReferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniReferenceQuery(get_called_class());
    }

}
