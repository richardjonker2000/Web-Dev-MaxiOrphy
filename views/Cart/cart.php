<?php

use app\models\Cart;
use app\models\Search\CartSearch;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use yii\bootstrap4\Html;

$this->title = 'Cart';

$this->params['breadcrumbs'][] = $this->title;

$userid = Yii::$app->user->id;
$searchModel = new CartSearch();
$dataProvider = $searchModel->search(['UserID' => $userid]);
$dataProvider->query->andWhere(['UserID' => $userid]);
Yii::$app->session->setFlash('cart');
?>
<div class="container text-center">
    <h1>Cart</h1>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => true,
        'hover' => true,
        'striped' => false,
        'tableOptions' => ['class' => 'bg-light'],
        'columns' => [
            'artwork.Name',
            [
                'attribute' => 'price',
                'format' => 'html',
                'value' => function ($data) {
                    return '' . $data['artwork']['price'] . '€';
                },
            ],
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web') . $data['artwork']['image']['ImageURL'],
                        ['width' => '70px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'buttons'=> [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>', 'userdelete?id='.$key['ArtworkID'], [

                            'title' => Yii::t('yii', 'Delete'),

                            'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),

                            'data-method' => 'post',

                        ]);
                    },
                ],


            ],
        ],
    ]);

    $cart = Cart::find()
        ->select(['Count(*) as CartCount'])
        ->where(['=', 'cart.UserID', Yii::$app->user->id])
        ->asArray()
        ->all();
    foreach ($cart as $cartitem) {
        $cartcount = $cartitem['CartCount'];
    }
    if ($cartcount != 0) {
        ActiveForm::begin([]);
        ?>
        <div class="form-group">
            <?= Html::submitButton('Checkout', ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <?php
        ActiveForm::end();
    }
    ?>
</div>
