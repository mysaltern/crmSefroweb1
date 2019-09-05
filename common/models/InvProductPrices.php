<?php


namespace common\models;


use Yii;


/**
 * This is the model class for table "inv_ProductPrices".
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
 * @property InvProductPriceDetails[] $invProductPriceDetails
 */
class InvProductPrices extends \yii\db\ActiveRecord
    {


    /**
     * @inheritdoc
     */
    public static function tableName()
        {
        return 'inv_ProductPrices';

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
            'id' => 'ID',
            'code' => 'کد',
            'name' => 'نام',
            'execTime' => 'تاریخ شروع',
            'expirationTime' => 'تاریخ پایان',
            'active' => 'وضعیت',
            'deleted' => 'Deleted',
            'createdTime' => 'تاریخ ایجاد',
            'modifiedTime' => 'Modified Time',
            'createdBy' => 'Created By',
            'modifiedBy' => 'Modified By',
        ];

        }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductPriceDetails()
        {
        return $this->hasMany(InvProductPriceDetails::className(), ['ProductPriceID' => 'id']);

        }


    /**
     * @inheritdoc
     * @return InvProductPricesQuery the active query used by this AR class.
     */
    public static function find()
        {
        return new InvProductPricesQuery(get_called_class());

        }


    }

