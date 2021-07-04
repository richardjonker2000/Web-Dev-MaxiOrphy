<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artwork */

$this->title = Yii::t('app', 'Create Artwork');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
