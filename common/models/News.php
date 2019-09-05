<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $photo
 * @property int $views
 * @property int $date
 * @property string $desc
 * @property int $type
 * @property int $publish_date
 * @property int $date_update
 * @property int $active
 * @property int $category_id
 * @property int $article
 *
 */
class News extends \yii\db\ActiveRecord
{

    public $date_, $publish_date_;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'desc'], 'required'],
            [['content', 'desc'], 'string'],
            [['views', 'type', 'active', 'date', 'publish_date', 'category_id', 'article', 'date_update'], 'integer'],
//            [['date', 'publish_date'], 'safe'],
            [['title', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'موضوع',
            'content' => 'خلاصه',
            'photo' => 'عکس',
            'views' => 'Views',
            'date_update' => 'تاریخ ویرایش',
            'date' => 'زمان',
            'desc' => 'متن کامل',
            'type' => 'Type',
            'category_id' => 'Category ID',
            'publish_date' => 'زمان انتشار',
            'active' => 'وضعیت',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public static function index($limit, $type, $category, $where)
    {



        $itemsQuery = News::find()->where(['active' => '1']);
        if ($limit > 0)
        {
            $itemsQuery->limit($limit);
        }
        if ($type == 'article')
        {
            $itemsQuery->andWhere(['article' => '1']);
        }
        $items = $itemsQuery->asArray()->all();
        return $items;
    }

    public function getCategory()
    {
        return $this->hasOne(CategoryWriting::className(), ['id' => 'category_id']);
    }

}
