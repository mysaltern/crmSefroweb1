<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_uni_name".
 *
 * @property int $id
 * @property string $name
 *
 * @property UniThesis[] $uniTheses
 */
class UniUniName extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_uni_name';
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
            'name' => 'نام دانشگاه',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniTheses()
    {
        return $this->hasMany(UniThesis::className(), ['uni_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniUniNameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniUniNameQuery(get_called_class());
    }

}
