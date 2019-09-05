<?php

namespace frontend\controllers;

use yii\data\Pagination;

class NewsController extends \yii\web\Controller
{

    public function actionIndex()
    {


        $cat = \common\models\CategoryWriting::find()->where(['type' => 1])->asArray()->all();

        $query = \common\models\News::find()->where(['active' => 1, 'article' => 0])->andWhere(['<', 'publish_date', time()]);

        if (isset($_GET['category']))
        {
            $query->andWhere(['category_id' => $_GET['category']]);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
                    'category' => $cat,
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
        if (($model = \common\models\News::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
