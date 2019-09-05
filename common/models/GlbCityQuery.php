<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GlbCity]].
 *
 * @see GlbCity
 */
class GlbCityQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return GlbCity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GlbCity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
