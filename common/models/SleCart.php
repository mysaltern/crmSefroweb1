<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sle_Cart".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $sessionID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property User $user
 * @property SleCartDetail[] $sleCartDetails
 */
class SleCart extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sle_Cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['sessionID'], 'string'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'کد کاربری',
            'sessionID' => 'Session ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSleCartDetails()
    {
        return $this->hasMany(SleCartDetail::className(), ['cartID' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SleCartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SleCartQuery(get_called_class());
    }

}
