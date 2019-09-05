<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniGrade]].
 *
 * @see UniGrade
 */
class UniGradeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniGrade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniGrade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
