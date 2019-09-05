<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $videofile
 * @property string $videoaddress
 * @property string $date_created
 * @property int $active
 * @property int $cat_id
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
       [['title', 'description', 'videofile', 'videoaddress'], 'string'],
            [['date_created'], 'safe'],
            [['active', 'cat_id'], 'integer'],
        //    [['cat_id'], 'required'],
            [['videofile'], 'file', 'skipOnEmpty' => true],
            [['videofile'], 'file', 'extensions' => 'gif, jpg , mp4',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'videofile' => Yii::t('app', 'Videofile'),
            'videoaddress' => Yii::t('app', 'Videoaddress'),
            'date_created' => Yii::t('app', 'Date Created'),
            'active' => Yii::t('app', 'Active'),
            'cat_id' => Yii::t('app', 'CategoryWriting'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return VideosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideosQuery(get_called_class());
    }
}
