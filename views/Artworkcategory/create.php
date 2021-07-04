<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artworkcategory */

$this->title = Yii::t('app', 'Create Artworkcategory');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworkcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artworkcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
