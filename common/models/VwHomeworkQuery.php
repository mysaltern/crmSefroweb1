<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[VwHomework]].
 *
 * @see VwHomework
 */
class VwHomeworkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VwHomework[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VwHomework|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
