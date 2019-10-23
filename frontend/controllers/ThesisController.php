<?php

namespace frontend\controllers;

use common\models\Profiles;
use common\models\UniThesisProfessor;
use Yii;
use common\models\UniThesis;
use common\models\UniThesisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ThesisController implements the CRUD actions for UniThesis model.
 */
class ThesisController extends Controller
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
                'only' => ['create', 'update', 'index'],
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
     * Lists all UniThesis models.
     * @return mixed
     */
    public function actionIndex()
    {

        $user_id = Yii::$app->user->id;

        $model = \common\models\UniThesis::find()->where(['user_id' => $user_id])->with('major')->with('grade')->with('uni')->asArray()->all();

        //  $profiles = Profiles::find()->where(['user_id' => $user_id])->with('major')->with('grade')->with('uni')->asArray()->one();

        return $this->render('index', [
            'model' => $model,
            //  'profiles' => $profiles,

        ]);
    }

    /**
     * Displays a single UniThesis model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "UniThesis #" . $id,
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
     * Creates a new UniThesis model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {


        $request = Yii::$app->request;
        $model = new UniThesis();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new UniThesis",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->validate()) {

                if ($model->url = UploadedFile::getInstance($model, 'url')) {
                    $model->url = UploadedFile::getInstance($model, 'url');
                    $model->url->saveAs('../../frontend/upload/thesis/' . $model->url->baseName . "." . $model->url->extension);
                    $model->save(false);
                }

                $model->save(false);


                if ($model->id) {
                    $profesoors = $model->professor;
                    $profesoorsRole = $model->professorRole;


                    $x = 0;
                    foreach ($profesoors as $profesoor) {
                        $thesisprofessor = new UniThesisProfessor();
                        $thesisprofessor->professor_id = $profesoor;
                        $thesisprofessor->professor_roleID = $profesoorsRole[$x];
                        $thesisprofessor->thesis_id = $model->id;
                        $thesisprofessor->save();
                        $x++;
                    }
                }
                if (isset($model->tags)) {

                    $tagsArr = explode(',', $model->tags);
                    foreach ($tagsArr as $arr) {
                        $tagsModel = new \common\models\Tag;
                        $tagsModel->table = 'thesis';
                        $tagsModel->name = $arr;
                        $tagsModel->record_id = $model->id;
                        $tagsModel->save(false);
                    }
                }


                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new UniThesis",
                    'content' => '<span class="text-success">Create UniThesis success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Create new UniThesis",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->validate()) {

                if ($model->pdffile = UploadedFile::getInstance($model, 'pdffile')) {
                    $model->pdffile = UploadedFile::getInstance($model, 'pdffile');
                    $model->pdffile->saveAs('../../frontend/upload/thesis/' . $model->pdffile->baseName . time() ."." . $model->pdffile->extension);
                    $model->pdffile = $model->pdffile->baseName . time() . "." . $model->pdffile->extension;
                    $model->save(false);
                }
                if ($model->url = UploadedFile::getInstance($model, 'url')) {
                    $model->url = UploadedFile::getInstance($model, 'url');
                    $model->url->saveAs('../../frontend/upload/thesis/' . $model->url->baseName . time() . "." . $model->url->extension);
                    $model->url = $model->url->baseName . time() . "." . $model->url->extension;
                    $model->save(false);
                }
                if ($model->wordfile = UploadedFile::getInstance($model, 'wordfile')) {
                    $model->wordfile= UploadedFile::getInstance($model, 'wordfile');
                    $model->wordfile->saveAs('../../frontend/upload/thesis/' . $model->wordfile->baseName . time() . "." . $model->wordfile->extension);
                    $model->wordfile = $model->wordfile->baseName . time() . "." . $model->wordfile->extension;
                    $model->save(false);
                }
                $model->save(false);
                if ($model->id) {
                    $profesoors = $model->professor;
                    $profesoorsRole = $model->professorRole;


                    $x = 0;
                    foreach ($profesoors as $profesoor) {
                        $thesisprofessor = new UniThesisProfessor();
                        $thesisprofessor->professor_id = $profesoor;
                        $thesisprofessor->professor_roleID = $profesoorsRole[$x];
                        $thesisprofessor->thesis_id = $model->id;
                        $thesisprofessor->save();
                        $x++;
                    }
                }

                if (isset($model->tags)) {

                    $tagsArr = explode(',', $model->tags);
                    foreach ($tagsArr as $arr) {
                        $tagsModel = new \common\models\Tag;
                        $tagsModel->table = 'thesis';
                        $tagsModel->name = $arr;
                        $tagsModel->record_id = $model->id;
                        $tagsModel->save(false);
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing UniThesis model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    /**
     * Delete an existing UniThesis model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing UniThesis model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the UniThesis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UniThesis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UniThesis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDownload($id)
    {
        $download = UniThesis::findone($id);

        $path = Yii::getAlias('@frontend') . '/upload/thesis/' . $download->url;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }
    public function actionWord($id)
    {
        $download = UniThesis::findone($id);

        $path = Yii::getAlias('@frontend') . '/upload/thesis/' . $download->wordfile;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }
    public function actionPdf($id)
    {
        $download = UniThesis::findone($id);

        $path = Yii::getAlias('@frontend') . '/upload/thesis/' . $download->pdffile;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }

}
