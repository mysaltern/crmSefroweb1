<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_writing".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 */
class CategoryWriting extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_writing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
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
            'name' => 'دسته بندی',
            'type' => 'Type',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CategoryWritingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryWritingQuery(get_called_class());
    }

}
