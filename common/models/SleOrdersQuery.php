<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleOrders]].
 *
 * @see SleOrders
 */
class SleOrdersQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleOrders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleOrders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
