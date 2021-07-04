<?php

use app\models\Cart;
use app\models\Order;
use app\models\Orderartwork;

$request = Yii::$app->request;
$artid = $request->get('id', -1);

if ($artid!=-1){
    if (!Yii::$app->user->isGuest){
        $userid = Yii::$app->user->id;
        $ordered = Orderartwork::artOrderedByUser($artid);
        $inCart = Cart::artInCart($artid);
        if ($ordered == 0 && $inCart == 0){
            $cart = new Cart();
            $cart->ArtworkID = $artid;
            $cart->UserID = $userid;
            $cart->save();

            Yii::$app->response->redirect(['cart/cart']);
        }
        else
            Yii::$app->response->redirect(['site/portfolio']);


    }
    else
        Yii::$app->response->redirect(['user/default/login']);


}else


Yii::$app->response->redirect(['site/index']);
