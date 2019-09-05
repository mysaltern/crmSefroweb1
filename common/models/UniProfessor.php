<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_professor".
 *
 * @property int $id
 * @property string $name
 *
 * @property UniThesisProfessor[] $uniThesisProfessors
 */
class UniProfessor extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_professor';
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
            'name' => 'نام استاد',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniThesisProfessors()
    {
        return $this->hasMany(UniThesisProfessor::className(), ['professor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniProfessorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniProfessorQuery(get_called_class());
    }

}
