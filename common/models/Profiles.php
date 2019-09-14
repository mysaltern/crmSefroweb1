<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%profiles}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $fname
 * @property string $lname
 * @property int $gender
 * @property string $datebrith
 * @property int $province_id
 * @property string $city
 * @property string $mobile
 * @property int $phone
 * @property int $major_id
 * @property int $grade_id
 * @property int $uni_id
 * @property int $numcollegian
 * @property int $jobstatus
 * @property string $jobdetail
 * @property string $jobdescription
 * @property string $nationalcode
 *
 * @property User $user
 * @property UniGrade $grade
 * @property UniUniName $uni
 * @property GlbProvince $province
 * @property UniMajor $major
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profiles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fname', 'lname', 'gender', 'datebrith', 'province_id', 'city', 'mobile', 'phone', 'major_id', 'grade_id', 'uni_id', 'numcollegian', 'jobstatus', 'nationalcode'], 'required'],
            [['user_id', 'gender', 'province_id', 'phone', 'major_id', 'grade_id', 'uni_id', 'numcollegian', 'jobstatus'], 'integer'],
            [['datebrith'], 'safe'],
            [['jobdescription'], 'string'],
            [['fname', 'lname', 'city', 'jobdetail'], 'string', 'max' => 255],
            [['mobile', 'nationalcode'], 'string', 'max' => 12],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['uni_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniUniName::className(), 'targetAttribute' => ['uni_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GlbProvince::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['major_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniMajor::className(), 'targetAttribute' => ['major_id' => 'id']],
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
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'gender' => Yii::t('app', 'Gender'),
            'datebrith' => Yii::t('app', 'Datebrith'),
            'province_id' => Yii::t('app', 'Province ID'),
            'city' => Yii::t('app', 'City'),
            'mobile' => Yii::t('app', 'Mobile'),
            'phone' => Yii::t('app', 'Phone'),
            'major_id' => Yii::t('app', 'Major ID'),
            'grade_id' => Yii::t('app', 'Grade ID'),
            'uni_id' => Yii::t('app', 'Uni ID'),
            'numcollegian' => Yii::t('app', 'Numcollegian'),
            'jobstatus' => Yii::t('app', 'Jobstatus'),
            'jobdetail' => Yii::t('app', 'Jobdetail'),
            'jobdescription' => Yii::t('app', 'Jobdescription'),
            'nationalcode' => Yii::t('app', 'Nationalcode'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(UniGrade::className(), ['id' => 'grade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(UniUniName::className(), ['id' => 'uni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(GlbProvince::className(), ['id' => 'province_id']);
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
     * @return ProfilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfilesQuery(get_called_class());
    }
}
