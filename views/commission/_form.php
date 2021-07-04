<?php

use app\models\Profile;
use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Commission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList(['Pending', 'In Progress', 'Completed'] )?>

    <?= $form->field($model, 'Priority')->dropDownList(['0'=>'Normal Priority', '1'=> 'High Priority'] ) ?>

    <?php $user = Profile::getAllAsArray();
    echo $form->field($model, "UserID")
    ->dropDownList(
    $user, ['prompt' => Yii::t('app', '-- Select User --')]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
