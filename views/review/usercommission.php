<?php

use app\models\Commission;
use app\models\Search\CommissionSearch;
use kartik\grid\GridView;
use yii\helpers\Html;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\CommissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Commissions');
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['//site/profile']];
$this->params['breadcrumbs'][] = $this->title;

$userid = Yii::$app->user->id;
$searchModel = new CommissionSearch();
$dataProvider = $searchModel->search(['UserID' => $userid]);
$dataProvider->query->andWhere(['UserID' => $userid])->orderBy('CommissionID DESC');


?>

<div class="container text-center">
    <h1>Commissions</h1>
    <?php
    echo GridView::widget([
            'dataProvider' => $dataProvider,
            'responsive' => true,
            'hover' => true,
            'striped' => false,
            'tableOptions' => ['class' => 'bg-light'],
            'columns' => [

                'Description',
                'Status',
                [
                    'attribute' => 'Priority',
                    'format' => 'html',
                    'value' => function ($data) {
                        if ($data['Priority'] == 0) return 'Normal'; else return 'High';
                    },
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            $text = '<span ';
                            if (Commission::reviewed($model['CommissionID']))
                                $text = $text . 'style = "display: none" ';
                            $text = $text . ' > Review this Commission</span > ';
                            return Html::a($text, 'createcommission?id=' . $key);
                        },
                    ],
                ],
            ]
        ]
    );

    ?>
</div>