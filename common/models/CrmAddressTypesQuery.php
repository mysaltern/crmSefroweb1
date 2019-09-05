<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CrmAddressTypes]].
 *
 * @see CrmAddressTypes
 */
class CrmAddressTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CrmAddressTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CrmAddressTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
