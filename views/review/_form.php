<?php

use app\models\Artwork;
use app\models\Commission;
use app\models\Profile;
use app\models\User;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Rating')->dropDownList(
            [1 => '1 star',
        2 =>'2 stars',
        3 =>'3 stars',
        4 =>'4 stars',
        5 =>'5 stars']) ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>



    <?php
    $commission = Commission::getAllAsArray();
    echo $form->field($model, "CommissionID")
        ->dropDownList(
            $commission, ['prompt' => Yii::t('app', '-- Select Commission --')]);
    ?>

    <?php
    $art = Artwork::getAllAsArray();
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
