<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Commission */

$this->title = Yii::t('app', 'Create Commission');
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
