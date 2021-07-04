<?php
$this->title = 'Profile';

$this->params['breadcrumbs'][] = $this->title;

use yii\bootstrap4\Html; ?>

<div class="container text-center">
    <h1>Profile</h1>

    <div class="row">
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100">
            <i id="" class="fa fa-truck fa-5x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Orders
            </span>
            </i>
        </div>', ['orders']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100">
            <i id="" class="fa fa-pencil-alt fa-5x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Reviews
            </span>
            </i>
        </div>', ['/review/artworkreview']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100">
            <i id="" class="fa fa-user fa-5x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Profile
            </span>
            </i>
        </div>', ['/user/default/account']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100">
            <i id="" class="fa fa-paint-brush fa-5x social p-1 ">
            <span class="h4 p-3 align-middle" style="font-family: sans-serif">
                Commission
            </span>
            </i>
        </div>', ['/review/usercommission']) ?>
        </div>
    </div>

</div>

