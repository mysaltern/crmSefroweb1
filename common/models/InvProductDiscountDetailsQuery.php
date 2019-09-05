<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductDiscountDetails]].
 *
 * @see InvProductDiscountDetails
 */
class InvProductDiscountDetailsQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return InvProductDiscountDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductDiscountDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
