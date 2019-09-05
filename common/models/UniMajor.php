<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_major".
 *
 * @property int $id
 * @property string $name
 */
class UniMajor extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_major';
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
            'name' => 'نام رشته',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UniMajorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniMajorQuery(get_called_class());
    }

}
