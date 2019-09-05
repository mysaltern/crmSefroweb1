<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductPrizes]].
 *
 * @see InvProductPrizes
 */
class InvProductPrizesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InvProductPrizes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductPrizes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
