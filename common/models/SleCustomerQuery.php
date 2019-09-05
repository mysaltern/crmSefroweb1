<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleCustomer]].
 *
 * @see SleCustomer
 */
class SleCustomerQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
