<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap4\ActiveForm */


use app\models\Artwork;
use app\models\Category;


use kartik\form\ActiveForm;


use maxiorphy\star_rating\ShowStars;
use yii\bootstrap4\LinkPager;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use yii\captcha\Captcha;


use yii\widgets\Pjax;


$this->title = 'Portfolio';
$this->params['breadcrumbs'][] = $this->title;

$categories = Category::getNameAsArray();
//$data=ArrayHelper::map($items, 'ArtworkID', 'Name','Description', );


?>

<div class="container text-center">
    <h1>Artwork</h1>
</div>

<div class="container mx-auto justify-content-center">
    <?php yii\widgets\Pjax::begin() ?>
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_INLINE,
        'formConfig' => ['deviceSize' => 'xl'],
        'options' => ['data-pjax' => true]
    ]); ?>


    <div class="form-group kv-fieldset-inline">


        <div class="row">

            <div class="col-lg p-4">
                <?= $form->field($model, 'date')->label(false)
                    ->dropDownList(
                        ['ASC' => 'Date Ascending',
                            'DESC' => 'Date Descending'],
                        ['prompt' => '--- Order by Date: ---']) ?>
            </div>
            <div class="col-lg p-4">
                <?= $form->field($model, 'rating')->label(false)->
                dropDownList(['ASC' => 'Rating Ascending',
                    'DESC' => ' Rating Descending'],
                    ['prompt' => '-- Order by Rating: --']) ?>
            </div>
            <div class="col-lg p-4">
                <?= $form->field($model, 'cat')->label(false)->dropDownList($categories, ['prompt' => '-- Select a category --']) ?>
            </div>
            <div class="col-lg p-4">
                <?= $form->field($model, 'searchText')->label(false) ?>
            </div>
            <div class="col-lg p-4 justify-content-center">
                <div class="form-group justify-content-center  ">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

    <div class="container">
        <div class="row">
            <?php
            foreach ($query as $art) {
                ?>
                <div class="col-lg-3 mt-4"><a href="artwork?id=<?= $art['ArtworkID'] ?>">
                        <div class="align-items-center">

                            <img src="<?=Artwork::getFirstImageURL($art['ArtworkID']) ?>"
                                 class="  rounded mx-auto d-block img-fluid portfolio-image">
                            <div class="portfolio-buttons-text">

                                <b><?= $art['Name'] ?></b>
                                <br>
                                <br>
                                <?php
                                echo Category::getArtworkCategory($art['ArtworkID']);
                                ?>

                                <br>
                                <?php
                                if ($art['price'])
                                    echo '<b>' . $art['price'] . '€</b><br>';
                                else
                                    echo '<br>';
                                echo ShowStars::widget(['rating'=>$art['AverageReview']]);

                                echo '<small>(' . round($art['AverageReview'], 1) . ')</small> '

                                ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
}
            ?>
        </div>


        <?php

        ?>
    </div>
    <?php Pjax::end() ?>
</div>








