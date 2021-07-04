<?php


$this->title = 'adminpage';
$this->params['breadcrumbs'][] = $this->title;

use yii\bootstrap4\Html; ?>

<div class="container text-center">
    <h1>Admin Settings: </h1>

    <div class="row">
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-users fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Users
            </span>
            </i>
        </div>', ['/user/admin']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-archive fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Categories
            </span>
            </i>
        </div>', ['/category']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-image fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Artworks
            </span>
            </i>
        </div>', ['/artwork']) ?>
        </div>

    </div>
    <div class="row">
    <div class="col-lg-4 p-3">
        <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-object-group fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Artwork-Categories
            </span>
            </i>
        </div>', ['/artworkcategory']) ?>
    </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-star fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Reviews
            </span>
            </i>
        </div>', ['/review']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-camera fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Artwork-Images
            </span>
            </i>
        </div>', ['/images']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-paint-brush fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Commissions
             </span>
            </i>
        </div>', ['/commission']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-shopping-cart fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Carts
            </span>
            </i>
        </div>', ['/cart']) ?>
        </div>
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-truck fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Orders
            </span>
            </i>
        </div>', ['/order']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 p-3">
            <?= Html::a('<div class="btn btn-primary btn-lg align-items-center w-100 h-100">
            <i id="" class="fa fa-cogs fa-2x social p-1 ">
            <span class="h3 p-3 align-middle" style="font-family: sans-serif">
                Manage Orders-Artworks
             </span>
            </i>
        </div>', ['/orderartwork']) ?>
        </div>
    </div>

</div>
