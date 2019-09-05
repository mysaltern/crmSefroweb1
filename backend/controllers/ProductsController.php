<?php

namespace backend\controllers;

use Yii;
use common\models\InvProducts;
use common\models\InvProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use Imagine\Gmagick\Image;

/**
 * ProductsController implements the CRUD actions for InvProducts model.
 */
class ProductsController extends Controller
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
                'only' => ['create', 'update', 'index', 'delete'],
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
     * Lists all InvProducts models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new InvProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvProducts model.
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
                'title' => "InvProducts #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('ویرایش', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
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
     * Creates a new InvProducts model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new InvProducts();

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "اضافه کردن محصول",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('ذخیره', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save(false))
            {


                if ($model->file = \yii\web\UploadedFile::getInstance($model, 'file'))
                {



                    $imageName = $model->file;

                    $model->file->saveAs('../images/product/large/' . $model->id . '.jpg');

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 145, 195)
                            ->save(Yii::getAlias('../images/product/small/' . $model->id . '.jpg'), ['quality' => 50]);

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 390, 525)
                            ->save(Yii::getAlias('../images/product/medium/' . $model->id . '.jpg'), ['quality' => 50]);

                    \common\models\GlbImages::insertIMG($imageName, 1, $model->id, "images/product/large/$model->id" . '.jpg');
                }


                $model->deleted = 0;
                $model->active = 1;
                $model->createdTime = date('Y-m-d H:i:s.u');
                $model->createdBy = Yii::$app->user->getId();
                $model->save(false);


                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "اضافه کردن محصول",
                    'content' => '<span class="text-success">Create InvProducts success</span>',
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => "اضافه کردن محصول",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('ذخیره', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        }
        else
        {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save(false))
            {

                if ($model->file = \yii\web\UploadedFile::getInstance($model, 'file'))
                {



                    $imageName = $model->file;

                    $model->file->saveAs('../images/product/large/' . $model->id . '.jpg');

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 120, 120)
                            ->save(Yii::getAlias('../images/product/small/' . $model->id . '.jpg'), ['quality' => 50]);

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 300, 300)
                            ->save(Yii::getAlias('../images/product/medium/' . $model->id . '.jpg'), ['quality' => 50]);
                }


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

    /**
     * Updates an existing InvProducts model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);




        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                $model_image = \common\models\GlbImages::getImage(1, $id);

                $model_image = $model_image['path'];
                return [
                    'title' => "ویرایش محصولات #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'path' => "$model_image"
                    ]),
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('ذخیره', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save())
            {



                if ($model->file = \yii\web\UploadedFile::getInstance($model, 'file'))
                {



                    $imageName = $model->file;

                    if (file_exists('../images/product/large/' . $model->id . '.jpg'))
                    {

                        unlink('../images/product/large/' . $model->id . '.jpg');
                    }
                    if (file_exists('../images/product/medium/' . $model->id . '.jpg'))
                    {
                        unlink('../images/product/medium/' . $model->id . '.jpg');
                    }

                    if (file_exists('../images/product/small/' . $model->id . '.jpg'))
                    {
                        unlink('../images/product/small/' . $model->id . '.jpg');
                    }

                    $model->file->saveAs('../images/product/large/' . $model->id . '.jpg');

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 145, 195)
                            ->save(Yii::getAlias('../images/product/small/' . $model->id) . '.jpg', ['quality' => 50]);

                    \yii\imagine\Image::thumbnail('../images/product/large/' . $model->id . '.jpg', 390, 525)
                            ->save(Yii::getAlias('../images/product/medium/' . $model->id . '.jpg'), ['quality' => 50]);


                    \common\models\GlbImages::insertIMG($imageName, 1, $model->id, "images/product/large/$model->id" . '.jpg');
                }

                $model->deleted = 0;
                $model->modifiedTime = date('Y-m-d H:i:s.u');
                $model->modifiedBy = Yii::$app->user->getId();
                $model->save();
                $model_image = \common\models\GlbImages::getImage(1, $id);
                $model_image = $model_image['path'];
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "InvProducts #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'path' => "$model_image"
                    ]),
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('ویرایش', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                $model_image = \common\models\GlbImages::getImage(1, $id);
                $model_image = $model_image['path'];
                return [
                    'title' => "ویرایش محصولات #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'path' => "$model_image"
                    ]),
                    'footer' => Html::button('بستن', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('ذخیره', ['class' => 'btn btn-primary', 'type' => "submit"])
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


                $model_image = \common\models\GlbImages::getImage(1, $id);
                $model_image = $model_image['path'];


                return $this->render('update', [
                            'model' => $model,
                            'path' => "$model_image"
                ]);
            }
        }
    }

    /**
     * Delete an existing InvProducts model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if (is_file('../images/product/large/' . $id . '.jpg'))
        {

            unlink('../images/product/large/' . $id . '.jpg');
        }
        if (is_file('../images/product/medium/' . $id . '.jpg'))
        {

            unlink('../images/product/medium/' . $id . '.jpg');
        }
        if (is_file('../images/product/small/' . $id . '.jpg'))
        {

            unlink('../images/product/small/' . $id . '.jpg');
        }

//        unlink('../images/product/medium/' . $id . '.jpg');
//        unlink('../images/product/small/' . $id . '.jpg');
        $img_master = new \common\models\GlbImages();
        $img_master->deleteAll("sourceRealtedID  = $id and imageTypeID = 1   ");
//        Yii::$app->db->createCommand()
//                ->update('glb_Images', ['deleted' => 1, 'active' => 0], "sourceRealtedID  = $id and imageTypeID = 1   ")
//                ->execute();
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
     * Delete multiple existing InvProducts model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
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
     * Finds the InvProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvProducts::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
