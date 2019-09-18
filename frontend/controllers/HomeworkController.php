<?php

namespace frontend\controllers;

use common\models\Profiles;
use common\models\UniReference;
use Yii;
use common\models\UniHomework;
use common\models\UniHomeworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * HomeworkController implements the CRUD actions for UniHomework model.
 */
class HomeworkController extends Controller
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
     * Lists all UniHomework models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new UniHomeworkSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }


    public function actionIndex()
    {


//

        $user_id = Yii::$app->user->id ;

        $model = \common\models\UniHomework::find()->where(['user_id' => $user_id])->with('user')->with('enteringyear')->with('lesson')->asArray()->all();

        $profiles = Profiles::find()->where(['user_id' => $user_id])->with('major')->with('grade')->with('uni')->asArray()->one();



        return $this->render('index', [
            'model' => $model,
            'profiles' => $profiles,

        ]);
    }




    public function actionDownload($id)
    {

        $download = UniHomework::findone($id);

        $path = Yii::getAlias('@frontend') . '/upload/homework/' . $download->hm_file;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);

        }
    }

    /**
     * Displays a single UniHomework model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "UniHomework #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new UniHomework model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new UniHomework();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new UniHomework",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post())) {
                $model->hm_file = UploadedFile::getInstance($model, 'hm_file');
                if ($model->hm_file && $model->validate()) {
                    $model->hm_file = UploadedFile::getInstance($model, 'hm_file');
                    $model->hm_file->saveAs('../../frontend/upload/homework/' . $model->hm_file->baseName . "." . $model->hm_file->extension);
                    $model->save(false);
                }
                $model->save(false);
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new UniHomework",
                    'content' => '<span class="text-success">Create UniHomework success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new UniHomework",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            if ($model->load($request->post()) ) {

                if ( $model->hm_file = UploadedFile::getInstance($model, 'hm_file' )) {

                    $hm_name = $model->hm_file->baseName . time() . "." . $model->hm_file->extension ;
                    $model->hm_file = UploadedFile::getInstance($model, 'hm_file');
                    $model->hm_file->saveAs('../../frontend/upload/homework/' . $model->hm_file->baseName  . time() . "." . $model->hm_file->extension);
                    $model->hm_file=  $hm_name ;
                    $model->save(false);

                }

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing UniHomework model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    /**
     * Delete an existing UniHomework model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */


    /**
     * Delete multiple existing UniHomework model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */


    /**
     * Finds the UniHomework model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UniHomework the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UniHomework::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
