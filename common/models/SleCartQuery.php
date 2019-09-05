<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleCart]].
 *
 * @see SleCart
 */
class SleCartQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleCart[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleCart|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
