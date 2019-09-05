<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniMajor]].
 *
 * @see UniMajor
 */
class UniMajorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniMajor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniMajor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
