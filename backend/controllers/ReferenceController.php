<?php

namespace backend\controllers;

use common\models\Headlines;
use common\models\Page;
use common\models\UniLesson;
use common\models\UniThesis;
use Yii;
use common\models\UniReference;
use common\models\UniReferenceSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ReferenceController implements the CRUD actions for UniReference model.
 */

class ReferenceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'index', 'delete' , 'test'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => TRUE,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all UniReference models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UniReferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single UniReference model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "UniReference #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        }
        else
        {
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new UniReference model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {


        $request = Yii::$app->request;
        $model = new UniReference();

        if ($request->isAjax)
        {

            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "Create new UniReference",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->validate())
            {


                $headlines_name = $model->headlinsname ;
                $lesson_id = $model->lesson_id ;

                if($model->headlinsname){
                    $head = new Headlines();
                    $head->name = $headlines_name ;
                    $head->lesson_id = $lesson_id;
                    $head->save(false);
                }
                $heads = (new \yii\db\Query())
                    ->select(['id'])
                    ->from('headlines')
                    ->orderBy('id DESC')
                    ->limit(1)
                    ->one();
                $heads_name =  $heads['id'];


                if ($model->url = UploadedFile::getInstance($model, 'url'))
                {
                    $urlname = $model->url->baseName . time() . "." . $model->url->extension ;
                    $model->url = UploadedFile::getInstance($model, 'url');
                    $model->url->saveAs('../../frontend/upload/reference/' . $model->url->baseName . time() . "." . $model->url->extension);
                    $model->url =  $urlname ;
                 if(!$model->headlines_id){

                     $model->headlines_id = $heads_name ;
                 }
                    $model->save(false);
                }
                if(!$model->headlines_id){

                    $model->headlines_id = $heads_name ;
                }

                $model->save(false);

             //   $headlines_id = $model->headlines_id;


                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new UniReference",
                    'content' => '<span class="text-success">Create UniReference success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => "Create new UniReference",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        }
        else
        {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {


                return $this->render('create', [
                    'model' => $model,



                ]);
            }
        }
    }
    public function actionSubcat() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Headlines::find()->where(['lesson_id' => $cat_id])->all();
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    /**
     * Updates an existing UniReference model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $url = $model->url;
        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "Update UniReference #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->validate())
            {

                if ($model->url = UploadedFile::getInstance($model, 'url'))
                {

                    $model->url = UploadedFile::getInstance($model, 'url');
                    $model->url->saveAs('../../frontend/upload/reference/' . $model->url->baseName  . "." . $model->url->extension);
                    $model->save(false);
                }
                else{
                    $model->url = $url ;
                }

                $model->save(false);

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "UniReference #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => "Update UniReference #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        }
        else
        {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing UniReference model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }
        else
        {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }



    /**
     * Delete multiple existing UniReference model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk)
        {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }
        else
        {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the UniReference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UniReference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UniReference::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }






//    public function actionDownload($id)
//    {
//
//        $download = Page::findone($id);
//
//        $path = Yii::getAlias('@common') . '/upload/css/' . $download->url;
//        if (file_exists($path)) {
//            return Yii::$app->response->sendFile($path);
//
//        }
//    }

}
