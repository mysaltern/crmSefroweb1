<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SleCartDetail]].
 *
 * @see SleCartDetail
 */
class SleCartDetailQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return SleCartDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SleCartDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
