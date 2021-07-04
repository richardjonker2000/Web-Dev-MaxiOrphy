<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Commission */

$this->title = Yii::t('app', 'Update Commission: {name}', [
    'name' => $model->CommissionID,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/site/adminpage']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommissionID, 'url' => ['view', 'id' => $model->CommissionID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="commission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
