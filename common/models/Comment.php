<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $entity
 * @property int $entityId
 * @property string $content
 * @property int $parentId
 * @property int $level
 * @property int $createdBy
 * @property int $updatedBy
 * @property string $relatedTo
 * @property string $url
 * @property int $status
 * @property int $createdAt
 * @property int $updatedAt
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity', 'entityId', 'content', 'createdBy', 'updatedBy', 'relatedTo', 'createdAt', 'updatedAt'], 'required'],
            [['entityId', 'parentId', 'level', 'createdBy', 'updatedBy', 'status', 'createdAt', 'updatedAt'], 'integer'],
            [['content', 'url'], 'string'],
            [['entity'], 'string', 'max' => 10],
            [['relatedTo'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity' => 'Entity',
            'entityId' => 'Entity ID',
            'content' => 'Content',
            'parentId' => 'Parent ID',
            'level' => 'Level',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'relatedTo' => 'Related To',
            'url' => 'Url',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
}
