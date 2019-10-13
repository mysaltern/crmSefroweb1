<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniPaper]].
 *
 * @see UniPaper
 */
class UniPaperQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniPaper[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniPaper|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
