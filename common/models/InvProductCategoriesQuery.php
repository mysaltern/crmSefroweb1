<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[InvProductCategories]].
 *
 * @see InvProductCategories
 */
class InvProductCategoriesQuery extends \yii\db\ActiveQuery
{
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return InvProductCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InvProductCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}
