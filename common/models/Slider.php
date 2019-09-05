<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $active
 * @property int $order
 * @property string $url
 */
class Slider extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order'], 'integer'],
            [['title', 'desc', 'active', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'نام',
            'desc' => 'توضیح',
            'title' => 'موضوع',
            'active' => 'وضعیت',
            'order' => 'ترتیب',
            'url' => 'عکس',
            'photo' => 'عکس',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }

    public static function index($limit)
    {



        $itemsQuery = Slider::find()->where(['active' => '1'])->orderBy('order');
        if ($limit > 0)
        {
            $itemsQuery->limit($limit);
        }

        $items = $itemsQuery->asArray()->all();
        return $items;
    }

}
