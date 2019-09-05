<?php

namespace backend\controllers;

use Yii;
use common\models\SleOrders;
use common\models\SleOrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\data\Pagination;
use common\models\SleOrderDetail;
use common\models\SleOrderStatusHistory;

/**
 * OrdersController implements the CRUD actions for SleOrders model.
 */
class OrdersController extends Controller
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
     * Lists all SleOrders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SleOrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SleOrders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$common->request;
        if ($request->isAjax)
        {
            Yii::$common->response->format = Response::FORMAT_JSON;
            return [
                'title' => "SleOrders #" . $id,
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
     * Creates a new SleOrders model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new SleOrders();

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "Create new SleOrders",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save())
            {
                $model->deleted = 0;
                $model->active = 1;
                $model->createdTime = date('Y-m-d H:i:s.u');
                $model->createdBy = Yii::$app->user->getId();
                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new SleOrders",
                    'content' => '<span class="text-success">Create SleOrders success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            }
            else
            {
                return [
                    'title' => "Create new SleOrders",
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
                $model->createdBy = Yii::$common->user->getId();
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
     * Updates an existing SleOrders model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$common->request;
        $model = $this->findModel($id);

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$common->response->format = Response::FORMAT_JSON;
            if ($request->isGet)
            {
                return [
                    'title' => "Update SleOrders #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
            else if ($model->load($request->post()) && $model->save())
            {
                $model->deleted = 0;
                $model->active = 1;
                $model->modifiedTime = date('Y-m-d H:i:s.u');
                $model->modifiedBy = Yii::$common->user->getId();
                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "SleOrders #" . $id,
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
                    'title' => "Update SleOrders #" . $id,
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
                $model->modifiedBy = Yii::$common->user->getId();
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
     * Delete an existing SleOrders model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$common->request;
        $this->findModel($id)->delete();

        if ($request->isAjax)
        {
            /*
             *   Process for ajax request
             */
            Yii::$common->response->format = Response::FORMAT_JSON;
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
     * Delete multiple existing SleOrders model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$common->request;
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
            Yii::$common->response->format = Response::FORMAT_JSON;
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
     * Finds the SleOrders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SleOrders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SleOrders::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays a single SleOrders model.
     * @param integer $id
     * @return mixed
     */
    public function actionShow()
    {
        $query = (new \yii\db\Query())
                ->select(['sle_Orders.id', 'user_id', 'sle_Orders.createdTime', 'sle_PaymentDetails.transcationNumber', 'crm_Contacts.fName', 'crm_Contacts.lName', 'crm_ContactAddresses.address', 'sle_PaymentTypes.paymentTypeName'])
                ->from('sle_Orders')
                ->where('sle_Orders.active=1 AND sle_Orders.deleted=0 ')
                ->leftJoin('crm_ContactAddresses', 'sle_Orders.contactAddressID=crm_ContactAddresses.id AND crm_ContactAddresses.active=1 AND crm_ContactAddresses.deleted=0')
                ->leftJoin('crm_Contacts', 'sle_Orders.contactAddressID=crm_Contacts.id AND sle_Orders.user_id=crm_Contacts.userID AND crm_Contacts.active=1 AND crm_Contacts.deleted=0')
                ->leftJoin('sle_PaymentDetails', 'sle_Orders.paymentDetailID=sle_PaymentDetails.id AND sle_PaymentDetails.active=1 AND sle_PaymentDetails.deleted=0')
                ->leftJoin('sle_PaymentTypes', 'sle_Orders.paymenttypeID=sle_PaymentTypes.id AND sle_PaymentTypes.active=1 AND sle_PaymentTypes.deleted=0');
        if (isset($_GET['per-page']) and ! empty($_GET['per-page']))
        {
            $limit = $_GET['per-page'];
        }
        else
        {
            $limit = 10;
        }

        $queryItem = $query;



        $countQuery = count($queryItem->all());
        $pages = new Pagination(['totalCount' => $countQuery, 'pageSize' => $limit]);

        $orders = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        foreach ($orders as $key => $value)
        {
            $orders[$key]['createdTime'] = Yii::$common->mycomponent->gregorian_to_jalali_date($value['createdTime']);
            $orders[$key]['SleOrderDetail'] = SleOrderDetail::find()
                    ->innerJoinWith(['product', 'glbImagesProduct'])
                    ->where(['t.orderID' => $value['id']])
                    ->alias('t')
                    ->asArray()
                    ->all();
//            $orders[$key]['SleOrderDetail']['product']=  \common\models\InvProducts::getProductDetail($orders[$key]['SleOrderDetail']['productID']);
            $sum = 0;
            if (!empty($orders[$key]['SleOrderDetail']))
                foreach ($orders[$key]['SleOrderDetail'] as $key2 => $value2)
                {
                    $sum += $value2['finalAmonutPrice'] * $value2['countNumber'];
                }
            $orders[$key]['sum'] = $sum;
        }
        foreach ($orders as $key => $value)
        {
            $orders[$key]['SleOrderStatusHistory'] = SleOrderStatusHistory::find()
                    ->innerJoinWith('orderStatus')
                    ->where(['t.orderID' => $value['id']])
                    ->alias('t')
                    ->asArray()
                    ->all();
        }
        return $this->render('my', ['orders' => $orders, 'pages' => $pages]);
    }

}
