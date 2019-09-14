<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Enteringyear]].
 *
 * @see Enteringyear
 */
class EnteringyearQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Enteringyear[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Enteringyear|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
