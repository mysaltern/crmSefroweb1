<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductPriceDetails]].
 *
 * @see InvProductPriceDetails
 */
class InvProductPriceDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InvProductPriceDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductPriceDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
