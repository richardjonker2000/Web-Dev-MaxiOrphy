<?php

use app\models\Artwork;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ImageURL')->textInput(['maxlength' => true]) ?>

    <?php
    $art = Artwork::getAllAsArray();
    echo $form->field($model, "ArtworkID")
        ->dropDownList(
            $art, ['prompt' => Yii::t('app', '-- Select Artwork --')]);
    ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
