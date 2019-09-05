<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleCustomerTypes]].
 *
 * @see SleCustomerTypes
 */
class SleCustomerTypesQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleCustomerTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleCustomerTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
