<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Logvisitor]].
 *
 * @see Logvisitor
 */
class LogvisitorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Logvisitor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Logvisitor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
