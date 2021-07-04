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


    <div class="site-about">
    <div class="container">
        <h1 class="text-center">About Me</h1>
        <br>

        <div class="container">

            <div class="row">
                <div class="col-lg-6">

                    <img class="art-img mx-auto  d-block p-1" src="../Themes/images/AboutGraffiti.jpg" alt="Graffiti Image">
                </div>
                <div class="col-lg-3">
                    Hi, I'm MaxiOrphy. I'm a freelance graphic design artist. My passion for art started in my home town
                    of
                    Trento, Italy where I used to participate in street art and many public graffiti events.
                    I also had an intrest in old art, and enjoyed frequenting art museums, and learning more about the
                    different techniques and styles.
                </div>

            </div>
            <br>
            <div class="row">


                <div class="col-lg-3 offset-lg-3 ">
                    My career in art started when I moved to Portugal, and started work as a professional tattoo artist
                    in 2018.
                    I was studying part-time and spent every free moment trying to improve my abilities as an artist.
                    I spent lots of time learning from my mentor and strived to always do better.
                    My favourite tattoo style is neo traditional.
                </div>

                <div class="col-lg-6">
                    <img class="art-img mx-auto d-block p-1" src="../Themes/images/AboutTattoo.jpg" alt="Tattoo Image">
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <img class="art-img mx-auto d-block p-1"  src="../Themes/images/AboutEmote.png" alt="Graffiti Image">

                </div>
                <div class="col-lg-3">
                    At the end of 2019 my Graphic design career began. I initially used it for designing tattoos, and
                    drawing sketches in my free time to learn the capabilities of the software.
                    I started doing Twitch emotes and overlays for some friends and people I knew, and eventually I
                    decided to do it professionally, along with my current job as a tattoo artist.
                    To date, I have done over 20 commissioned pieces for different clients, and I plan on increasing
                    this number daily with your help!
                </div>

            </div>

        </div>
    </div>

    <div class="container">
    <h1 class="text-center">Contact Me</h1>
    <div class="container text-center">
    Please feel free to contact me on any of my social media platforms listed below or alternatively fill in the form!


<?php if (Yii::$app->session->hasFlash('aboutFormSubmitted')): ?>
    <div class="alert alert-success">
        Thank you for contacting us. We will respond to you as soon as possible.
    </div>
<?php else: ?>
    <div class="col-lg-6 offset-lg-3">
        <?php $form = ActiveForm::begin(['id' => 'about-form']); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'about-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>


    </div>

<?php endif; ?>