<?php

/* @var $this \yii\web\View */

/* @var $content string */


use app\models\Cart;
use app\models\Category;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <div class="row align-items-center d-none d-lg-block logo">


    </div>
</div>
<div class="wrap">

    <?php
    $categories = [Category::getNameAsArray()];
    $temp = [];
    foreach ($categories as $value) {
        foreach ($value as $key => $value2) {
            array_push($temp, ['label' => $value2, 'url' => ['/site/portfolio?category=' . $key]]);
        }
    }
    $cart = Cart::find()
        ->select(['Count(*) as CartCount'])
        ->where(['=', 'cart.UserID', Yii::$app->user->id])
        ->asArray()
        ->all();
    foreach ($cart as $cartitem){
        $cartcount = $cartitem['CartCount'];
    }

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => ['class' => 'd-lg-none'],
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light my-navbar ',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav  justify-content-center mx-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Portfolio', 'url' => ['/site/portfolio']],
            ['label' => 'Commission', 'url' => ['/site/commission']],
            ['label' => 'Categories', 'url' => ['/site/error'],
                'items' => $temp],
            ['label' => 'Admin', 'url' => ['/site/adminpage'],
                'visible' => Yii::$app->user->can('admin'),
                ],

            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'My Profile', 'url' => ['/site/profile'], 'visible' => !Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ? ['label' => 'Login', 'url' => ['/user/login']] :
                ['label' => 'Logout ',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']],

            ['label' => '<i id="" class="fa fa-shopping-cart social "></i><small>(' .$cartcount.')</small>', 'url' => ['/cart/cart'], 'visible' => !Yii::$app->user->isGuest],
        ],
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container p-1">
        <?= Breadcrumbs::widget([
            'options' => ['class' => ' my-breadcrumbs m-1 P-0'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= null //Alert::widget([ 'body' => 'Say hello...',])  ?>

    </div>
    <div class="container p-1">
        <?= $content ?>
    </div>
</div>


<footer class="footer bg-transparent" style="border-top: none">


    <div class="container" style="text-align:center">
        <a href="https://www.facebook.com/paolo.cagol.7"><i id="" class="fab fa-facebook-square fa-3x social social-fb"></i></a>
        <a href="https://twitter.com/Maxi942_Design"><i id="" class="fab fa-twitter-square fa-3x social social-tw"></i></a>
        <a href="https://www.instagram.com/maxiorphy/"><i id="" class="fab fa-instagram fa-3x social social-insta"></i></a>

        <p style="text-center">
            Artwork by <b>MaxiOrphy</b> -Web Design by <b> Richard Jonker </b> & <b>Paolo Cagol </b></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
