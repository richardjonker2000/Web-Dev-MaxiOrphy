<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = Yii::t('app', 'Create Review');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
