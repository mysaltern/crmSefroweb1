<?php

namespace backend\controllers;

use Yii;
use common\models\InvProductCategories;
use common\models\InvProductCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * CategoryController implements the CRUD actions for InvProductCategories model.
 */
class CategoryController extends Controller
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
                'only' => ['create', 'update', 'index', 'delete', 'level2'],
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
     * Lists all InvProductCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvProductCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvProductCategories model.
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
                'title' => "InvProductCategories #" . $id,
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
     * Creates a new InvProductCategories model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new InvProductCategories();

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "Create new InvProductCategories",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save())
            {




                if ($model->levelno == 0 or $model->levelno == null)
                {
                    $model->levelno = 1;
                }
                if (!empty($model->parentID))
                {
                    $levelThat = InvProductCategories::findOne(['id' => $model->parentID]);
                    $level = $levelThat['levelno'];
                    if ($level == 0 or $level == null)
                    {
                        $model->levelno = 1;
                    }
                    else
                    {
                        $model->levelno = $level + 1;
                    }
                }

                if ($model->parentID == 0)
                {
                    $model->parentID = null;
                }

                $model->deleted = 0;
                $model->active = 1;
                $model->createdTime = date('Y-m-d H:i:s.u');
                $model->createdBy = Yii::$app->user->getId();
                $model->save();

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new InvProductCategories",
                    'content' => '<span class="text-success">Create InvProductCategories success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => "Create new InvProductCategories",
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

                $model->deleted = 0;
                $model->active = 1;
                $model->createdTime = date('Y-m-d H:i:s.u');
                $model->createdBy = Yii::$app->user->getId();
                $model->save();


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
     * Updates an existing InvProductCategories model.
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
                return [
                    'title' => "Update InvProductCategories #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save())
            {


                if ($model->levelno == 0 or $model->levelno == null)
                {
                    $model->levelno = 1;
                }
                if (!empty($model->parentID))
                {
                    $levelThat = InvProductCategories::findOne(['id' => $model->parentID]);
                    $level = $levelThat['levelno'];
                    if ($level == 0 or $level == null)
                    {
                        $model->levelno = 1;
                    }
                    else
                    {
                        $model->levelno = $level + 1;
                    }
                }

                if ($model->parentID == 0)
                {
                    $model->parentID = null;
                }

                $model->deleted = 0;
                $model->active = 1;
                $model->modifiedTime = date('Y-m-d H:i:s.u');
                $model->modifiedBy = Yii::$app->user->getId();
                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "InvProductCategories #" . $id,
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
                    'title' => "Update InvProductCategories #" . $id,
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
                $model->deleted = 0;
                $model->active = 1;
                $model->modifiedTime = date('Y-m-d H:i:s.u');
                $model->modifiedBy = Yii::$app->user->getId();
                $model->save();


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
     * Delete an existing InvProductCategories model.
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
     * Delete multiple existing InvProductCategories model.
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
     * Finds the InvProductCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvProductCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvProductCategories::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // THE CONTROLLER
    public function actionLevel2()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'][0]))
        {
            $parents = $_POST['depdrop_parents'][0];

            $out = \common\models\InvProductCategories::find()->where(['parentID' => $parents])->all();


            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output' => $out, 'selected' => '']);
            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionLevel3()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'][1]))
        {
            $parents = $_POST['depdrop_parents'][1];

            $out = \common\models\InvProductCategories::find()->where(['parentID' => $parents])->all();


            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output' => $out, 'selected' => '']);
            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

}
