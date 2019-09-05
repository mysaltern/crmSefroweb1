<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductSpecificationTypes]].
 *
 * @see InvProductSpecificationTypes
 */
class InvProductSpecificationTypesQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return InvProductSpecificationTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductSpecificationTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
