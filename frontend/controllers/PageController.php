<?php

namespace frontend\controllers;

use yii\data\Pagination;

class PageController extends \yii\web\Controller
{

    public function actionIndex()
    {

        $query = \common\models\Page::find()->where(['active' => 1])->andWhere(['<', 'publish_date', time()]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = \common\models\Page::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
