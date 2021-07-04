<?php

namespace app\controllers;

use app\models\Order;
use app\models\Orderartwork;
use Yii;
use app\models\Cart;
use app\models\Search\CartSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['cart', 'userdelete'],
                        'allow' =>false,
                        'roles'=>['?'],
                    ],
                    [
                    'actions' => ['cart', 'userdelete'],
                    'allow' =>true,
                    'roles'=>['@'],
                ]

                ],
            ],

        ];
    }

    /**
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cart model.
     * @param integer $ArtworkID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ArtworkID, $UserID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ArtworkID, $UserID),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArtworkID' => $model->ArtworkID, 'UserID' => $model->UserID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ArtworkID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ArtworkID, $UserID)
    {
        $model = $this->findModel($ArtworkID, $UserID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArtworkID' => $model->ArtworkID, 'UserID' => $model->UserID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ArtworkID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ArtworkID, $UserID)
    {
        $this->findModel($ArtworkID, $UserID)->delete();
        if (Yii::$app->session->hasFlash('cart')){
            return $this->redirect(['cart']);
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ArtworkID
     * @param integer $UserID
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ArtworkID, $UserID)
    {
        if (($model = Cart::findOne(['ArtworkID' => $ArtworkID, 'UserID' => $UserID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCart(){
        $userid = Yii::$app->user->id;
        if ($userid != null) {
            if(Yii::$app->request->post()){
                Order::makeOrder();
                return $this->redirect(['/site/orders']);

            }
            return $this->render('cart', ['userID' =>$userid]);
        }


    }

    public function actionUserdelete($id)
    {
        $userID = Yii::$app->user->id;
        $model = $this->findModel($id,$userID);
        if ($id!=null && $userID!=null) {
            $model->delete();
            return $this->redirect(['cart']);
        }

        return $this->redirect(['cart']);
    }
}
