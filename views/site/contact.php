<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\AboutForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

use yii\captcha\Captcha;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('aboutFormSubmitted')): ?>
    <div class="alert alert-success">
        Thank you for submitting a commission. You will get a respond soon!
    </div>
<?php else: ?>
    <div class="col-lg-6 offset-lg-3">
        <?php $form = ActiveForm::begin(['id' => 'about-form']); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?php
        echo $form->field($model, 'worktype[]')->dropDownList(
            ['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']
        ); ?>
        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'about-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


    <div class="container">
        <h1 class="text-center">Sizing Information</h1>
        <div class="container text-center">
            For any information regarding art sizes please feel free to checkout this <a href="">Sizing Chart</a> or
            Contact Me!
        </div>

    </div>




<?php endif; ?>