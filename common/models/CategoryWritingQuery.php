<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CategoryWriting]].
 *
 * @see CategoryWriting
 */
class CategoryWritingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CategoryWriting[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CategoryWriting|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
