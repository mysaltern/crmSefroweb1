<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductDiscounts]].
 *
 * @see InvProductDiscounts
 */
class InvProductDiscountsQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return InvProductDiscounts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductDiscounts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
