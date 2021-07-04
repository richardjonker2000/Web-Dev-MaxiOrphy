<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\CommissionForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


$this->title = 'Commission';
$this->params['breadcrumbs'][] = $this->title;


?>

<script>
    function temp(select) {
        var style;
        if (select.value == 2) {
            style = 'block';
        } else {
            style = 'none';
        }
        document.getElementById('quantity').style.display = style;
    }
</script>

<div class="container text-center">
    <h1>Commission</h1>
    <br>

    If you would like me to make you some kind of artwork, please fill in this form below, and I will contact you as soon as I can!
    <br> <br>
    <?php if (Yii::$app->session->hasFlash('commissionFormSubmitted')): ?>
        <div class="alert alert-success">
            Thank you for submitting a commission. You will get a response soon!
        </div>
    <?php else: ?>
    <b>
        <div class="col-lg-6 offset-lg-3 ">
            <?php $form = ActiveForm::begin(['id' => 'about-form']); ?>

            <?php

            echo $form->field($model, 'category')->dropDownList(
                [0 => '-- Select a Category --',1 => 'Overlay', 2 => 'Emotes', 3 => 'Panels', 4 => 'Custom Artwork'],
                ['id' => 'category', 'onchange' => 'temp(this)']
            ); ?>
            <div class="box" id='quantity' style="display: none">    <?php
                echo $form->field($model, 'quantity')->dropDownList(
                    [ 1 => '1-3', 2 => '4-5', 3 => '6-9', 4 => '10+'],
                    ['id' => 'quantity']
                ); ?></div>

            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'priority')->checkbox()->label('High Priority <small> *Price might vary</small>') ?>
    </b>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'about-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    <?php endif; ?>
    <div class="container">
        <h1 class="text-center">Sizing Information</h1>
        <div class="container text-center">
            For any information regarding art sizes please feel free to checkout this <a href="">Sizing Chart</a> or
            Contact Me!
        </div>

    </div>

</div>


