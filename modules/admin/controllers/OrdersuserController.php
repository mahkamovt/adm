<?php

namespace app\modules\admin\controllers;
use Yii;
use app\modules\admin\models\Ordershop;
use app\modules\admin\models\OrderItems;
use app\modules\admin\models\Product;
use yii\behaviors\TimestampBehavior;
use mdm\admin\models\User;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class OrdersuserController extends AppAdminController
{


    public $layout = 'lk-user';

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

    public function actionIndex()
    {

        $warning = array();
        $dataProvider = new ActiveDataProvider([
            'query' => Ordershop::find(),
        ]);

        $ordersUser = Yii::$app->user->identity->ordershop;
        if (isset($ordersUser)){
        } else {

            $warning['cound_order'] = 0;
            $ordersUser = false;
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,'warning' => $warning, 'ordersUser' => $ordersUser
        ]);
    }




    public function actionView($id)
    {


        $userProducts = orderItems::find()->where(['order_id' => $id])->all();
        $UserInfo = User::find()->where(['id' => $id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id), 'userProducts' => $userProducts, 'UserInfo' => $UserInfo
        ]);
    }

    public function actionCreate()
    {
        $model = new Ordershop();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['account']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ordershop model.
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
     * Deletes an existing Ordershop model.
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
     * Finds the Ordershop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordershop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordershop::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
