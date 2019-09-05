<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniUniName]].
 *
 * @see UniUniName
 */
class UniUniNameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniUniName[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniUniName|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
