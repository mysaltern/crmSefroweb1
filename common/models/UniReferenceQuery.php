<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniReference]].
 *
 * @see UniReference
 */
class UniReferenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniReference[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniReference|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
