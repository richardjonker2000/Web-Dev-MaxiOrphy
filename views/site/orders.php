<?php

use app\models\Orderartwork;
use app\models\Search\OrderartworkSearch;
use app\models\Search\OrderSearch;
use kartik\grid\GridView;

$this->title = 'orders';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['//site/profile']];
$this->params['breadcrumbs'][] = $this->title;

$userid = Yii::$app->user->id;
$searchModel = new OrderSearch();
$dataProvider = $searchModel->search(['UserID' => $userid]);
$dataProvider->query->andWhere(['UserID' => $userid])->orderBy('DateTime DESC');


?>

<div class="container text-center">
    <h1>Orders</h1>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => true,
        'hover' => true,
        'striped' => false,
        'tableOptions' => ['class' => 'bg-light'],
        'columns' => [
            'OrderID',
            'DateTime',
            'Status',

            [
                'class' => '\kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new OrderartworkSearch();
                    $searchModel->OrderID = $model->OrderID;
                    $dataProvider = $searchModel->search(yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_ordersArtwork', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider
                    ]);

                }

            ]


        ],
    ]);

    ?>
</div>