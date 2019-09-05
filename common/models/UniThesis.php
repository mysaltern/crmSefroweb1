<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uni_thesis".
 *
 * @property int $id
 * @property string $issue
 * @property string $url
 * @property int $user_id
 * @property int $date_defense
 * @property string $feild1
 * @property int $grade_id
 * @property int $uni_id
 * @property int $major_id
 *
 * @property UniGrade $grade
 * @property UniUniName $uni
 * @property UniThesisProfessor[] $uniThesisProfessors
 */
class UniThesis extends \yii\db\ActiveRecord
{

    public $professor;
    public $tags;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uni_thesis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_defense', 'grade_id', 'uni_id', 'major_id'], 'integer'],
            ['professor', 'each', 'rule' => ['integer']],
            [['url'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf , rar , zip'],
            [['issue', 'tags', 'feild1'], 'string', 'max' => 255],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['uni_id'], 'exist', 'skipOnError' => true, 'targetClass' => UniUniName::className(), 'targetAttribute' => ['uni_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'issue' => 'موضوع',
            'url' => 'Url',
            'user_id' => 'User ID',
            'date_defense' => 'Date Defense',
            'feild1' => 'Feild1',
            'grade_id' => 'Grade ID',
            'uni_id' => 'Uni ID',
            'major_id' => 'Major ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(UniGrade::className(), ['id' => 'grade_id']);
    }

    public function getMajor()
    {
        return $this->hasOne(UniMajor::className(), ['id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(UniUniName::className(), ['id' => 'uni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniThesisProfessors()
    {
        return $this->hasMany(UniThesisProfessor::className(), ['thesis_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UniThesisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UniThesisQuery(get_called_class());
    }

    public static function createMultiple($model, $multipleModels = [])
    {
        $model = new $model;
        $formName = $model->formName();
        $post = Yii::$app->request->post($formName);
        $models = [];

        if (!empty($multipleModels))
        {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post))
        {
            foreach ($post as $i => $item)
            {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']]))
                {
                    $models[] = $multipleModels[$item['id']];
                }
                else
                {
                    $models[] = new $model;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

    public function upload()
    {
        if ($this->validate())
        {
            $this->url->saveAs('uploads/' . $this->url->baseName . '.' . $this->url->extension);
            return true;
        }
        else
        {
            return false;
        }
    }

}
