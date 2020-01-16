<?php

namespace backend\controllers;

use Yii;
use backend\models\Post;
use backend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
        
        if ($model->save()) {
            $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file) {
                    if ($model->validate()) {
                        $model->file_name = $model->id . '_' . $model->file->baseName .
                                            '.' . $model->file->extension;//KZ_image.jpg
                        $model->save();
                        $file_upload_result = $model->file->saveAs(Yii::getAlias('@uploads') .
                                                                   '/post/' . $model->file_name);
                        if (!$file_upload_result) {
                            $transaction->rollBack();
                            return $this->render('create', [
                                'model' => $model,
                            ]);
                        }
                    } else {
                        $transaction->rollBack();
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            $transaction->rollBack();
        }
    }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($model->save()) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file) {
                    $upload_dir = Yii::getAlias('@uploads') . '/post/';
                    if ($model->validate()) {
                        $old_file_path = $upload_dir . $model->file_name;
                        $new_file_name = $model->id . '_' . $model->file->baseName . '.' .
                                         $model->file->extension;
                        $file_upload_result = $model->file->saveAs($upload_dir . $new_file_name);
                        if (!$file_upload_result) {
                            $transaction->rollBack();
                            return $this->render('update', [
                                'model' => $model,
                            ]);
                        } else {
                            $model->updateAttributes(['file_name' => $new_file_name]);
                            @unlink($old_file_path);
                        }
                    } else {
                        $transaction->rollBack();
                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }
                }
            }
            $transaction->commit();
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetImage($file_name) {
        $base_path = Yii::getAlias('@uploads') . '/post/';
        if (file_exists($base_path . $file_name)) {
            return Yii::$app->response->sendFile($base_path . $file_name);
        }
        return false;
    }
}
