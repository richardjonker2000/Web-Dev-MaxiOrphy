<?php

use app\models\Artwork;
use app\models\Category;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Artworkcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artworkcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $art = Artwork::getAllAsArray();
    echo $form->field($model, "ArtworkID")
        ->dropDownList(
            $art, ['prompt' => Yii::t('app', '-- Select Artwork --')]);
    ?>


    <?php
    $category = Category::getAllAsArray();
    echo $form->field($model, "CategoryID")
        ->dropDownList(
            $category, ['prompt' => Yii::t('app', '-- Select Category --')]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
