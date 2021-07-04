<?php

namespace app\controllers;

use Yii;
use app\models\Artworkcategory;
use app\models\Search\ArtworkcategorySearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtworkcategoryController implements the CRUD actions for Artworkcategory model.
 */
class ArtworkcategoryController extends Controller
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
     * Lists all Artworkcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtworkcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artworkcategory model.
     * @param integer $ArtworkID
     * @param integer $CategoryID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ArtworkID, $CategoryID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ArtworkID, $CategoryID),
        ]);
    }

    /**
     * Creates a new Artworkcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Artworkcategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArtworkID' => $model->ArtworkID, 'CategoryID' => $model->CategoryID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Artworkcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ArtworkID
     * @param integer $CategoryID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ArtworkID, $CategoryID)
    {
        $model = $this->findModel($ArtworkID, $CategoryID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ArtworkID' => $model->ArtworkID, 'CategoryID' => $model->CategoryID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Artworkcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ArtworkID
     * @param integer $CategoryID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ArtworkID, $CategoryID)
    {
        $this->findModel($ArtworkID, $CategoryID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artworkcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ArtworkID
     * @param integer $CategoryID
     * @return Artworkcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ArtworkID, $CategoryID)
    {
        if (($model = Artworkcategory::findOne(['ArtworkID' => $ArtworkID, 'CategoryID' => $CategoryID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
