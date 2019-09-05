<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleOrderStatusHistory]].
 *
 * @see SleOrderStatusHistory
 */
class SleOrderStatusHistoryQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleOrderStatusHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleOrderStatusHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
