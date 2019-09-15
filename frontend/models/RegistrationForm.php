<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace frontend\models;

use dektrium\user\models\User;
use dektrium\user\traits\ModuleTrait;
use Yii;
use yii\base\Model;

/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends Model
{
    use ModuleTrait;
    /**
     * @var string User email address
     */
    public $fname;
    public $lname;
    public $gender;
    public $datebrith;
    public $province_id;
    public $city;
    public $mobile;
    public $phone;
    public $major_id;
    public $grade_id;
    public $uni_id;
    public $jobstatus;
    public $jobdetail;
    public $jobdescription;
    public $numcollegian;
    public $enteringyear_id;


    public $email;

    /**
     * @var string Username
     */
    public $username;

    /**
     * @var string Password
     */
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
            // username rules
            'usernameTrim' => ['username', 'trim'],
            'usernameLength' => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernamePattern' => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique' => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken')
            ],
            // email rules
            'emailTrim' => ['email', 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern' => ['email', 'email'],
            'emailUnique' => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken')
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength' => ['password', 'string', 'min' => 6, 'max' => 72],

            'fnameRequired' => ['fname', 'required'],
            'lnameRequired' => ['lname', 'required'],
            'genderRequired' => ['gender', 'required'],
            //   'datebrithRequired' => ['datebrith', 'required'],
            'province_idRequired' => ['province_id', 'required'],
            'cityRequired' => ['city', 'required'],
            'mobileRequired' => ['mobile', 'required'],
            'mobileLength' => ['mobile', 'integer'],
            'phoneRequired' => ['phone', 'required'],
            'phoneLength' => ['phone', 'integer'],
            //  'major_idRequired' => ['major_id', 'required'],
            //   'grade_idRequired' => ['grade_id', 'required'],
            //   'uni_idRequired' => ['uni_id', 'required'],
            'jobstatusRequired' => ['jobstatus', 'required'],
            //  'jobdetailRequired' => ['jobdetail', 'required'],
            'jobdescriptionRequired' => ['jobdescription', 'required'],
            //   'numcollegianRequired' => ['numcollegian', 'required'],
            'numcollegianLength' => ['numcollegian', 'integer'],
            //  'enteringyear_idRequired' => ['enteringyear_id', 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),

            'fname' => Yii::t('user', 'نام'),
            'lname' => Yii::t('user', 'نام خانوادگی'),
            'gender' => Yii::t('user', 'جنسیت'),
            'datebrith' => Yii::t('user', 'تاریخ تولد'),
            'province_id' => Yii::t('user', 'استان محل سکونت'),
            'city' => Yii::t('user', 'شهر محل سکونت'),
            'mobile' => Yii::t('user', 'تلفن همراه'),
            'phone' => Yii::t('user', 'تلفن ثابت'),
            'major_id' => Yii::t('user', 'رشته ی تحصیلی'),
            'grade_id' => Yii::t('user', 'مقطع'),
            'uni_id' => Yii::t('user', 'دانشگاه محل تحصیل'),
            'jobstatus' => Yii::t('user', 'وضعیت شغلی'),
            'jobdetail' => Yii::t('user', 'عنوان شغلی'),
            'jobdescription' => Yii::t('user', 'شرح مختصری از سوابق کاری'),
            'numcollegian' => Yii::t('user', 'شماره دانشجویی'),
            'nationalcode' => Yii::t('user', 'کد ملی'),
            'enteringyear_id' => Yii::t('user', 'سال ورود'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function formName()
    {
        return 'register-form';
    }

    /**
     * Registers a new user account. If registration was successful it will set flash message.
     *
     * @return bool
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;
        }

        Yii::$app->session->setFlash(
            'info',
            Yii::t(
                'user',
                'Your account has been created and a message with further instructions has been sent to your email'
            )
        );

        return true;
    }

    /**
     * Loads attributes to the user model. You should override this method if you are going to add new fields to the
     * registration form. You can read more in special guide.
     *
     * By default this method set all attributes of this model to the attributes of User model, so you should properly
     * configure safe attributes of your User model.
     *
     * @param User $user
     */
    protected function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);
    }
}
