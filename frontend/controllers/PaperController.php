<?php

namespace frontend\controllers;

use common\models\UniThesis;
use Yii;
use common\models\UniPaper;
use common\models\UniPaperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * PaperController implements the CRUD actions for UniPaper model.
 */
class PaperController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all UniPaper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = \common\models\UniPaper::find()->where(['active' => 1])->asArray()->all();

        return $this->render('index', [
            'model' => $model ,
        ]);
    }


    /**
     * Displays a single UniPaper model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "UniPaper #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new UniPaper model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    /**
     * Updates an existing UniPaper model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    /**
     * Delete an existing UniPaper model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */


     /**
     * Delete multiple existing UniPaper model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */



    /**
     * Finds the UniPaper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UniPaper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UniPaper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDownload($id)
    {
        $download = UniPaper::findone($id);

        $path = Yii::getAlias('@frontend') . '/upload/paper/' . $download->files;
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }
    }
}
