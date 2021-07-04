<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\ArtworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Artworks');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Artwork'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'striped'=> false,
        'tableOptions'=>['class'=>'bg-light'],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ArtworkID',
            'Name',
            'Description',
            'ReleaseDate',
            'Size',
            //'price',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>


</div>
