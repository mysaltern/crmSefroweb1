<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%vw_homework}}".
 *
 * @property int $id
 * @property int $homeworkid
 * @property string $fname
 * @property string $lname
 * @property int $gender
 * @property string $city
 * @property string $mobile
 * @property int $phone
 * @property int $numcollegian
 * @property int $jobstatus
 * @property string $jobdetail
 * @property string $jobdescriotion
 * @property int $profilesid
 * @property string $date_sent
 * @property string $hm_file
 * @property string $lessonname
 * @property string $majorname
 * @property string $gradename
 * @property string $uniname
 * @property string $username
 * @property string $term
 */
class VwHomework extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vw_homework}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'homeworkid', 'gender', 'phone', 'numcollegian', 'jobstatus', 'profilesid'], 'integer'],
            [['jobdescriotion','description'], 'string'],
            [['date_sent'], 'safe'],
            [['fname', 'lname', 'city', 'jobdetail', 'hm_file', 'lessonname', 'majorname', 'gradename', 'uniname', 'username', 'term'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'homeworkid' => Yii::t('app', 'Homeworkid'),
            'fname' => Yii::t('app', 'نام'),
            'lname' => Yii::t('app', 'نام خانوادگی'),
            'gender' => Yii::t('app', 'جنسیت'),
            'city' => Yii::t('app', 'شهر'),
            'mobile' => Yii::t('app', 'موبایل'),
            'phone' => Yii::t('app', 'تلفن ثابت'),
            'numcollegian' => Yii::t('app', 'کد دانشجویی'),
            'jobstatus' => Yii::t('app', 'وضعیت شغلی'),
            'jobdetail' => Yii::t('app', 'عنوان شغلی'),
            'jobdescriotion' => Yii::t('app', 'سوابق شغلی'),
            'profilesid' => Yii::t('app', 'Profilesid'),
            'date_sent' => Yii::t('app', 'تاریخ ارسال'),
            'hm_file' => Yii::t('app', 'فایل'),
            'lessonname' => Yii::t('app', 'نام درس'),
            'majorname' => Yii::t('app', 'رشته'),
            'gradename' => Yii::t('app', 'مقطع'),
            'uniname' => Yii::t('app', 'دانشگاه'),
            'username' => Yii::t('app', 'کد ملی'),
            'term' => Yii::t('app', 'نیم سال تحصیلی'),
            'description' => Yii::t('app', 'توضیحات'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return VwHomeworkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VwHomeworkQuery(get_called_class());
    }
    public static function primaryKey()
    {
        return array('id');

    }
}
