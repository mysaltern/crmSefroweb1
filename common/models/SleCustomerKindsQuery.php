<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleCustomerKinds]].
 *
 * @see SleCustomerKinds
 */
class SleCustomerKindsQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleCustomerKinds[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleCustomerKinds|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
