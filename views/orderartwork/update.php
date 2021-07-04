<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orderartwork */

$this->title = Yii::t('app', 'Update Orderartwork: {name}', [
    'name' => $model->OrderID,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orderartworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrderID, 'url' => ['view', 'OrderID' => $model->OrderID, 'ArtworkID' => $model->ArtworkID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="orderartwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
