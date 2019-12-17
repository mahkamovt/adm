<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Post;
use app\models\ImageUpload;
use app\models\BannerUpload;
use app\models\MainimageUpload;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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



/*Главное изображение новости*/
    public function actionSetImage($id)

    {
       $model = new ImageUpload;
       $post = $this->findModel($id);
       if (Yii::$app->request->isPost)
       {

         $post = $this->findModel($id);
         $file = UploadedFile::getInstance($model, 'image');

         if($post->saveImage($model->uploadFile($file, $post->image)))
          {
            return $this->redirect(['view', 'id'=>$post->id]);
          }


       }
       return $this->render('image', compact('model','post'));
    }

/*/Главное изображение новости*/

/*Баннер новости*/

public function actionSetBanner($id)

    {
       $model = new BannerUpload;
        $post = $this->findModel($id);
       if (Yii::$app->request->isPost)
       {

          $post = $this->findModel($id);
          $file = UploadedFile::getInstance($model, 'banner');


          if($post->saveBanner($model->uploadFile($file, $post->banner)))
          {
            return $this->redirect(['view', 'id'=>$post->id]);
          }


       }
       return $this->render('banner', compact('model','post'));
    }

/*/Баннер новости*/

    /*Изображения на главной для новости*/

public function actionSetMainimage($id)

    {
       $model = new MainimageUpload;
       $post = $this->findModel($id);

       if (Yii::$app->request->isPost)
       {

          $post = $this->findModel($id);
          $file = UploadedFile::getInstance($model, 'mainimage');


          if($post->saveMainimage($model->uploadFile($file, $post->mainimage)))
          {
            return $this->redirect(['view', 'id'=>$post->id]);
          }


       }
       return $this->render('mainimage', compact('model','post'));
    }

}




