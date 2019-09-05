<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CrmDepartments]].
 *
 * @see CrmDepartments
 */
class CrmDepartmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CrmDepartments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CrmDepartments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
