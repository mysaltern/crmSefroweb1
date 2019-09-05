<?php

namespace frontend\controllers;

use common\models\UniReference;
use common\models\Videos;
use Yii;

class ReferenceController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'download'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
//                'denyCallback' => function ($rule, $action)
//                {
//                    if (\Yii::$app->user->can('@'))
//                    {
//
//                    }
//                    else
//                    {
//                        return $action->controller->redirect(Url::to(['user/login']));
//                    }
//                    if (\Yii::$app->user->can('user3'))
//                    {
//
//                    }
//                    else
//                    {
//                        return $action->controller->redirect(Url::to(['file/document']));
//                    }
//                },
            ],
        ];
    }

    public function actionIndex()
    {


        $model = \common\models\UniReference::find()->with('major')->with('lesson')->asArray()->all();


        return $this->render('index', [
            'model' => $model,
        ]);
    }




        public function actionDownload($id)
    {

        $download = UniReference::findone($id);

        $path = Yii::getAlias('@common') . '/upload/reference/' . $download->url;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);

        }
    }



}
