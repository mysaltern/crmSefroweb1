<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%enteringyear}}".
 *
 * @property int $id
 * @property string $name
 */
class Enteringyear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enteringyear}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return EnteringyearQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnteringyearQuery(get_called_class());
    }
}
