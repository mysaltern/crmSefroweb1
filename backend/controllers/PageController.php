<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionImageUpload()
    {
        $model = new WhateverYourModel();

        $imageFile = UploadedFile::getInstance($model, 'photo');

        $directory = Yii::getAlias('@common/upload') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory))
        {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile)
        {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath))
            {
                $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                return Json::encode([
                            'files' => [
                                [
                                    'name' => $fileName,
                                    'size' => $imageFile->size,
                                    'url' => $path,
                                    'thumbnailUrl' => $path,
                                    'deleteUrl' => 'image-delete?name=' . $fileName,
                                    'deleteType' => 'POST',
                                ],
                            ],
                ]);
            }
        }

        return '';
    }

    public function actionCreate()
    {
        $model = new Page();

        if ($model->load(Yii::$app->request->post()))
        {

            $imageFile = UploadedFile::getInstance($model, 'photo');

            $directory = Yii::getAlias('@common/upload') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
            $file = \yii\web\UploadedFile::getInstance($model, 'photo');
            $directory = Yii::getAlias('@common/upload') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
            if (!is_dir($directory))
            {
                FileHelper::createDirectory($directory);
            }


            if ($imageFile)
            {
                $uid = uniqid(time(), true);
                $fileName = $uid . '.' . $imageFile->extension;
                $filePath = $directory . $fileName;
                if ($imageFile->saveAs($filePath))
                {
                    $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                }
            }



            $model->time = time();

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $photo = $model->photo;
        if ($model->load(Yii::$app->request->post()))
        {

            $file = \yii\web\UploadedFile::getInstance($model, 'photo');
            if ($file != null)
            {


                if ($fileModel = \mdm\upload\FileModel::saveAs($file, ['uploadPath' => '@common/upload']))
                {
                    $model->photo = $fileModel->id;
                }
            }
            else
            {
                $model->photo = $photo;
            }
            $model->time = time();

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
