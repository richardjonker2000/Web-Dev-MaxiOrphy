<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = Yii::t('app', 'Update Review: {name}', [
    'name' => $model->ReviewID,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ReviewID, 'url' => ['view', 'id' => $model->ReviewID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
