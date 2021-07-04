<?php

/* @var $this yii\web\View */


$this->title = 'MaxiOrphy';

use yii\bootstrap4\Html; ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap');
    </style>
</head>


<div class="container">
    <div class="row">
        <?= Html::a('
            <div  style="position: relative">
                <img class="commission-home-button ">
                <div class="home-buttons-text">Want to have your own personalized artwork?</div>
            </div>', ['/site/commission']); ?>

    </div>
    <br>
    <div class="row">
        <?= Html::a('        
            <div style="position: relative">
                <img class="portfolio-home-button ">
                <div class="home-buttons-text">If you want to see my work click here!</div>
            </div>', ['/site/portfolio']); ?>

    </div>
</div>


</div>

</a>

