<?php

use app\models\Cart;
use app\models\Search\CartSearch;
use app\models\Search\ReviewSearch;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use maxiorphy\star_rating\ShowStars;
use yii\bootstrap4\Html;

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['//site/profile']];
$this->params['breadcrumbs'][] = $this->title;

$userid = Yii::$app->user->id;
$searchModel = new ReviewSearch();
$dataProvider = $searchModel->search([]);
$dataProvider->query->andWhere(['UserID' => $userid]);
$dataProvider->query->andWhere(['IS NOT', 'ArtworKID', null]);
//Yii::$app->session->setFlash('cart');
?>
<div class="container text-center">
    <h1>Artwork Reviews</h1>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => true,
        'hover' => true,
        'striped' => false,
        'tableOptions' => ['class' => 'bg-light'],
        'columns' => [
            'artwork.Name',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web') . $data['artwork']['image']['ImageURL'],
                        ['width' => '70px']);
                },
            ],
            [
            'attribute'=>'Rating',
                'format'=>'html',
                'value' => function ($data) {
                    return ShowStars::widget(['rating'=>$data['Rating']]);
                },
            ],
            'Description',


            ['class' => 'yii\grid\ActionColumn',
               'buttons'=> [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil-alt"></i>', 'userupdate?id='.$key);
                    },
                   'delete' => function ($url, $model, $key) {
                       return Html::a('<i class="fa fa-trash"></i>', 'userdelete?id='.$key,[

                           'title' => Yii::t('yii', 'Delete'),

                           'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),

                           'data-method' => 'post',

                       ]);
                   },
                ],


            ],
        ],
    ]);

    ?>
    <h1>Commission Reviews</h1>
    <?php
    $dataProvider = $searchModel->search([]);
    $dataProvider->query->andWhere(['UserID' => $userid]);
    $dataProvider->query->andWhere(['IS NOT', 'CommissionID', null]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => true,
        'hover' => true,
        'striped' => false,
        'tableOptions' => ['class' => 'bg-light'],
        'columns' => [
            'commission.Description',
            [
                'attribute'=>'Rating',
                'format'=>'html',
                'value' => function ($data) {
                    return ShowStars::widget(['rating'=>$data['Rating']]);
                },
            ],
            'Description',


            ['class' => 'yii\grid\ActionColumn',
                'buttons'=> [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil-alt"></i>', 'userupdate?id='.$key);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>', 'userdelete?id='.$key, [

                            'title' => Yii::t('yii', 'Delete'),

                            'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),

                            'data-method' => 'post',

                        ]);
                    },
                ],


            ],
        ],
    ]);

    ?>
</div>
