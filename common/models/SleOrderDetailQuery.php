<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleOrderDetail]].
 *
 * @see SleOrderDetail
 */
class SleOrderDetailQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleOrderDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleOrderDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
