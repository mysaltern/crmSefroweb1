<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "glb_Images".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $imageSizeID
 * @property integer $imageTypeID
 * @property integer $sourceRealtedID
 * @property integer $active
 * @property integer $deleted
 * @property string $createdTime
 * @property string $modifiedTime
 * @property integer $createdBy
 * @property integer $modifiedBy
 *
 * @property GlbImageTypes $imageType
 * @property InvProductCategories[] $invProductCategories
 */
class GlbImages extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glb_Images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'string'],
            [['imageSizeID', 'imageTypeID', 'sourceRealtedID', 'active', 'deleted', 'createdBy', 'modifiedBy'], 'integer'],
            [['createdTime', 'modifiedTime'], 'safe'],
            [['imageTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => GlbImageTypes::className(), 'targetAttribute' => ['imageTypeID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => ' کد اصلی',
            'name' => 'نام',
            'path' => 'Path',
            'imageSizeID' => 'Image Size ID',
            'imageTypeID' => 'Image Type ID',
            'sourceRealtedID' => 'Source Realted ID',
            'active' => 'وضعیت',
            'deleted' => 'وضعیت حدف',
            'createdTime' => 'زمان ساخت',
            'modifiedTime' => 'زمان آخرین اصلاح',
            'createdBy' => 'اضافه شده توسط',
            'modifiedBy' => 'ویرایش شده توسط',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageType()
    {
        return $this->hasOne(GlbImageTypes::className(), ['id' => 'imageTypeID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvProductCategories()
    {
        return $this->hasMany(InvProductCategories::className(), ['imageID' => 'id']);
    }

    public static function insertIMG($name, $type, $id_things, $path)
    {
        $connection = \Yii::$app->db;


        $connection->createCommand()->insert('glb_Images', [
            'name' => $name,
            'path' => $path,
            'active' => 1,
            'deleted' => 0,
            'createdBy' => Yii::$app->user->getId(),
            'createdTime' => date('Y-m-d H:i:s.u'),
            'sourceRealtedID' => $id_things,
            'imageTypeID' => $type,
        ])->execute();
    }

    public static function UpdateIMG($name, $id_things, $path)
    {
        $connection = \Yii::$app->db;


        $connection->createCommand()->update('glb_Images', [
            'name' => $name,
            'path' => $path,
            'modifiedBy' => Yii::$app->user->getId(),
            'modifiedTime' => date('Y-m-d H:i:s.u'),
                ], "sourceRealtedID = $id_things")->execute();
    }

    public static function getImage($type, $id)
    {
        $rows = (new \yii\db\Query())
                ->select(['path'])
                ->from('glb_Images')
                ->where("glb_Images.imageTypeID = $type and sourceRealtedID = $id ")
                ->one();



        return $rows;
    }

}
