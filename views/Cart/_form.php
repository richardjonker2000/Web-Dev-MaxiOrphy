<?php

use app\models\Artwork;
use app\models\Profile;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $art = Artwork::getAllAsArrayWithPrice();
    echo $form->field($model, "ArtworkID")
        ->dropDownList(
            $art, ['prompt' => Yii::t('app', '-- Select Artwork --')]);
    ?>


    <?php
    $user = Profile::getAllAsArray();
    echo $form->field($model, "UserID")
        ->dropDownList(
            $user, ['prompt' => Yii::t('app', '-- Select User --')]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
