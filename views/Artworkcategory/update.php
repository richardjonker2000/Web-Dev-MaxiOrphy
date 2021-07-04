<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artworkcategory */

$this->title = Yii::t('app', 'Update Artworkcategory: {name}', [
    'name' => $model->ArtworkID,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworkcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ArtworkID, 'url' => ['view', 'ArtworkID' => $model->ArtworkID, 'CategoryID' => $model->CategoryID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artworkcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
