<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%uni_homework}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 * @property string $hm_file
 * @property string $date_sent
 * @property int $enteringyear_id
 *@property int $profiles_id
 * @property User $user
 * @property UniLesson $lesson
 * @property Enteringyear $enteringyear
 */
class UniHomework extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%uni_homework}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'enteringyear_id', 'profiles_id'], 'required'],
            [['user_id', 'lesson_id', 'enteringyear_id'], 'integer'],
            [['date_sent'], 'safe'],
            [['description'], 'string'],
            [['hm_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniLesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
            [['enteringyear_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enteringyear::className(), 'targetAttribute' => ['enteringyear_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'lesson_id' => Yii::t('app', 'درس'),
            'hm_file' => Yii::t('app', 'تکلیف'),
            'date_sent' => Yii::t('app', 'تاریخ ارسال'),
            'enteringyear_id' => Yii::t('app', 'ترم'),
            'profiles_id' => Yii::t('app', 'Profiles ID'),
            'description' => Yii::t('app', 'توضیحات'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProfiles()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profiles_id']);
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
    public function getEnteringyear()
    {
        return $this->hasOne(Enteringyear::className(), ['id' => 'enteringyear_id']);
    }

    /**
     * {@inheritdoc}
     * @return UniHomeworkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniHomeworkQuery(get_called_class());
    }
}
