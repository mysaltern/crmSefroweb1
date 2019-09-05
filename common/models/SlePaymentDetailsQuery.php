<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SlePaymentDetails]].
 *
 * @see SlePaymentDetails
 */
class SlePaymentDetailsQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SlePaymentDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SlePaymentDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
