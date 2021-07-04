<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artwork */

$this->title = Yii::t('app', 'Update Artwork: {name}', [
    'name' => $model->Name,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ArtworkID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
