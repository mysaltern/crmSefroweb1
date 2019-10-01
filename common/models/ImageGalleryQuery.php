<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ImageGallery]].
 *
 * @see ImageGallery
 */
class ImageGalleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ImageGallery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ImageGallery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
