<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_grade".
 *
 * @property int $id
 * @property string $name
 *
 * @property UniThesis[] $uniTheses
 */
class UniGrade extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_grade';
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
            'name' => 'مقطع تحصیلی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniTheses()
    {
        return $this->hasMany(UniThesis::className(), ['grade_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniGradeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniGradeQuery(get_called_class());
    }

}
