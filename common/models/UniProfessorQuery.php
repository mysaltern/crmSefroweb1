<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniProfessor]].
 *
 * @see UniProfessor
 */
class UniProfessorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniProfessor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniProfessor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
