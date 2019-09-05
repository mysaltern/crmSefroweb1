<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_thesis_professor".
 *
 * @property int $id
 * @property int $thesis_id
 * @property int $professor_id
 * @property int $rate_order
 *
 * @property UniThesis $thesis
 * @property UniProfessor $professor
 */
class UniThesisProfessor extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_thesis_professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['thesis_id', 'professor_id', 'rate_order'], 'integer'],
            [['thesis_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniThesis::className(), 'targetAttribute' => ['thesis_id' => 'id']],
            [['professor_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniProfessor::className(), 'targetAttribute' => ['professor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thesis_id' => 'Thesis ID',
            'professor_id' => 'نام استاد',
            'rate_order' => 'Rate Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesis()
    {
        return $this->hasOne(UniThesis::className(), ['id' => 'thesis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(UniProfessor::className(), ['id' => 'professor_id']);
    }

    /**
     * {@inheritdoc}
     * @return UniThesisProfessorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniThesisProfessorQuery(get_called_class());
    }

}
