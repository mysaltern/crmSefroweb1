<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductPriceTypes]].
 *
 * @see InvProductPriceTypes
 */
class InvProductPriceTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InvProductPriceTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductPriceTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
