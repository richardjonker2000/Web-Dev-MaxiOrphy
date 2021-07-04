<?php

use app\models\Artwork;
use app\models\Order;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orderartwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderartwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $order = Order::getAllAsArray();
    echo $form->field($model, "OrderID")
        ->dropDownList(
            $order, ['prompt' => Yii::t('app', '-- Select Order --')]);
    ?>

    <?php
    $art = Artwork::getAllAsArrayWithPrice();
    echo $form->field($model, "ArtworkID")
        ->dropDownList(
            $art, ['prompt' => Yii::t('app', '-- Select Artwork --')]);
    ?>


    <?= $form->field($model, 'Amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
