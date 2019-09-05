<?php


namespace app\controllers;


use Yii;
use app\models\InvProductPrices;
use app\models\InvProductPricesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;


/**
 * ProductpricesController implements the CRUD actions for InvProductPrices model.
 */
class ProductpricesController extends Controller
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
     * Lists all InvProductPrices models.
     * @return mixed
     */
    public function actionIndex()
        {
        $searchModel = new InvProductPricesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);

        }


    /**
     * Displays a single InvProductPrices model.
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
                'title' => "InvProductPrices #" . $id,
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
     * Creates a new InvProductPrices model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
        {
        $request = Yii::$app->request;
        $model = new InvProductPrices();

        if ($request->isAjax)
            {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
                {
                return [
                    'title' => "Create new InvProductPrices",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
                }
            else if ($model->load($request->post()) && $model->save())
                {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new InvProductPrices",
                    'content' => '<span class="text-success">Create InvProductPrices success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
                }
            else
                {
                return [
                    'title' => "Create new InvProductPrices",
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


    /**
     * Updates an existing InvProductPrices model.
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
                    'title' => "Update InvProductPrices #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
                }
            else if ($model->load($request->post()) && $model->save())
                {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "InvProductPrices #" . $id,
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
                    'title' => "Update InvProductPrices #" . $id,
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
     * Delete an existing InvProductPrices model.
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
     * Delete multiple existing InvProductPrices model.
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
     * Finds the InvProductPrices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvProductPrices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
        {
        if (($model = InvProductPrices::findOne($id)) !== null)
            {
            return $model;
            }
        else
            {
            throw new NotFoundHttpException('The requested page does not exist.');
            }

        }


    }

