<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniThesisProfessor]].
 *
 * @see UniThesisProfessor
 */
class UniThesisProfessorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniThesisProfessor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniThesisProfessor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
