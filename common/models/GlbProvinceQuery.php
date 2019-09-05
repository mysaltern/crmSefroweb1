<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GlbProvince]].
 *
 * @see GlbProvince
 */
class GlbProvinceQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return GlbProvince[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GlbProvince|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
