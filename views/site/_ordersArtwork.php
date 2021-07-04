<?php

use kartik\grid\GridView;
use yii\bootstrap4\Html;

?>
<div class="orderartwork-index">
<?=GridView::widget([


    'dataProvider' => $dataProvider,
    'filterModel'=>$searchModel,
    'striped'=> false,
    'tableOptions'=>['class'=>'bg-light '],

    'columns' => [
        ['class'=> 'kartik\grid\SerialColumn'],
        [
            'attribute' => 'price',
            'format' => 'html',
            'value' => function ($data) {
                return '' . $data['Amount'] . '€';
            },
        ],
        [
            'attribute' => 'Artwork',
            'format' => 'html',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@web') . $data['artwork']['image']['ImageURL'],
                    ['width' => '70px']);
            },
        ],
    ]
]);
?>
</div>