<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-login text-center">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal mx-auto col-lg-4 offset-lg-4'],
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-lg-6 control-label'],
        ],

    ]); ?>
    <b>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    </b>
    <?= $form->field($model, 'rememberMe', [
        'template' => "{label}<div class=\"offset-4 col-lg-4\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
    ])->checkbox(
        []
    ) ?>

    <div class="form-group">
        <div class="col">
        <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?>

        <br/><br/>

        <?= Html::a(Yii::t("user", "Register"), ["/user/register"]) ?> /
        <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?> /
        <br>
        <?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>

    </div>
</div>

<?php ActiveForm::end(); ?>

<?php if (Yii::$app->get("authClientCollection", false)): ?>
    <div class="col-lg-offset-2 col-lg-10">
        <?= yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['/user/auth/login']
        ]) ?>
    </div>
<?php endif; ?>



</div>
