<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "inv_ProductPrizes".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $execTime
 * @property string $expirationTime
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property InvProductPrizeDetails[] $invProductPrizeDetails
 */
class InvProductPrizes extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'inv_ProductPrizes';

        }


    /**
     * @inheritdoc
     */
    public function rules()
        {
        return [
                [['code', 'name'], 'string'],
                [['name'], 'required'],
                [['execTime', 'expirationTime', 'createdTime', 'modifiedTime'], 'safe'],
                [['active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
        ];

        }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
        {
        return [
            'id' => ' کد اصلی',
            'code' => 'کد',
            'name' => 'نام جایزه',
            'execTime' => 'تاریخ شروع',
            'expirationTime' => 'تاریخ پایان',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حدف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
        ];

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPrizeDetails()
        {
        return $this->hasMany(InvProductPrizeDetails::className(), ['productPrizeID' => 'id']);

        }


    }

