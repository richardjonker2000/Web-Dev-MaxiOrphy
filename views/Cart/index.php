<?php

use kartik\grid\GridView;
use yii\helpers\Html;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Carts');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cart'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'striped'=> false,
        'tableOptions'=>['class'=>'bg-light'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ArtworkID',
            'artwork.Name',
            'UserID',
            'user.profile.full_name',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
