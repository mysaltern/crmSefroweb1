<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductPrizeDetails]].
 *
 * @see InvProductPrizeDetails
 */
class InvProductPrizeDetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InvProductPrizeDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductPrizeDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
