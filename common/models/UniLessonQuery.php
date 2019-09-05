<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UniLesson]].
 *
 * @see UniLesson
 */
class UniLessonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UniLesson[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UniLesson|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
