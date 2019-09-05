<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniProfessorRole]].
 *
 * @see UniProfessorRole
 */
class UniProfessorRoleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniProfessorRole[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniProfessorRole|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
