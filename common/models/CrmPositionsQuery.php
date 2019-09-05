<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CrmPositions]].
 *
 * @see CrmPositions
 */
class CrmPositionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CrmPositions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CrmPositions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
