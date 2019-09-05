<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CrmContactTypes]].
 *
 * @see CrmContactTypes
 */
class CrmContactTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CrmContactTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CrmContactTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
