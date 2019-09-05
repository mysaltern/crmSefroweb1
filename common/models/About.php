<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $tell
 * @property string $tell2
 * @property string $address
 * @property string $lat
 * @property string $lng
 */
class About extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tell', 'tell2', 'address', 'lat', 'lng'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tell' => 'تلفن',
            'tell2' => 'تلفن ۲',
            'address' => 'آدرس',
            'lat' => 'طول جغرافیایی',
            'lng' => 'عرض جغرافیایی',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AboutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AboutQuery(get_called_class());
    }

}
