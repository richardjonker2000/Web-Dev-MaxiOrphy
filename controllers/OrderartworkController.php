<?php

namespace app\controllers;

use Yii;
use app\models\Orderartwork;
use app\models\Search\OrderartworkSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderartworkController implements the CRUD actions for Orderartwork model.
 */
class OrderartworkController extends Controller
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

                ],
            ],

        ];
    }

    /**
     * Lists all Orderartwork models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderartworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderartwork model.
     * @param integer $OrderID
     * @param integer $ArtworkID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($OrderID, $ArtworkID)
    {
        return $this->render('view', [
            'model' => $this->findModel($OrderID, $ArtworkID),
        ]);
    }

    /**
     * Creates a new Orderartwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orderartwork();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'OrderID' => $model->OrderID, 'ArtworkID' => $model->ArtworkID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orderartwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $OrderID
     * @param integer $ArtworkID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($OrderID, $ArtworkID)
    {
        $model = $this->findModel($OrderID, $ArtworkID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'OrderID' => $model->OrderID, 'ArtworkID' => $model->ArtworkID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orderartwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $OrderID
     * @param integer $ArtworkID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($OrderID, $ArtworkID)
    {
        $this->findModel($OrderID, $ArtworkID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orderartwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $OrderID
     * @param integer $ArtworkID
     * @return Orderartwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($OrderID, $ArtworkID)
    {
        if (($model = Orderartwork::findOne(['OrderID' => $OrderID, 'ArtworkID' => $ArtworkID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
