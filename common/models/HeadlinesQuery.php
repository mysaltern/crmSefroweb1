<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Headlines]].
 *
 * @see Headlines
 */
class HeadlinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Headlines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Headlines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
