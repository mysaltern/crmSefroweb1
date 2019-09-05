<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_professor_role".
 *
 * @property int $id
 * @property string $name
 *
 * @property UniThesisProfessor[] $uniThesisProfessors
 */
class UniProfessorRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_professor_role';
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniThesisProfessors()
    {
        return $this->hasMany(UniThesisProfessor::className(), ['professor_roleID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniProfessorRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniProfessorRoleQuery(get_called_class());
    }
}
