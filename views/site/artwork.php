<?php

use app\models\Artwork;
use app\models\Artworkcategory;
use app\models\Cart;
use app\models\Category;
use app\models\Images;
use app\models\Orderartwork;
use app\models\Review;
use kartik\form\ActiveForm;
use kartik\rating\StarRating;
use maxiorphy\star_rating\AutoloadExample;
use maxiorphy\star_rating\ShowStars;
use yii\bootstrap4\Html;

$request = Yii::$app->request;
$artid = $request->get('id', 1);

if ($art = Artwork::findOne($artid)) {
//var_dump($art);
    $images = $art->images;

    $this->title = $art->Name;
    $this->params['breadcrumbs'][] = ['label' => 'Portfolio', 'url' => ['portfolio']];
    $this->params['breadcrumbs'][] = $this->title;


    ?>
    <div class="artwork">
        <div class="slideshow-container">
            <div class="squareemote">
                <?php foreach ($images as $image) {
                    echo '<div class="mySlides art-fade">
                                <img class="art-images art-img" id="myImg" src="' . $image->ImageURL . '" alt="' . $art->Name . '">
                          </div>';
                }
                ?>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

            </div>
            <a class="art-prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="art-next" onclick="plusSlides(1)">&#10095;</a>
            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slides[slideIndex - 1].style.display = "block";
                }
            </script>

        </div>
        <h1><?= $art->Name ?></h1>
        <small><?= Category::getArtworkCategory($art->ArtworkID) ?></small>
        <hr>
        <?php
        if ($art->price != null)
            echo "<p class=\"price\">" . $art->price . "€</p>";
        ?>

        <p><?= $art->Description ?></p>
        <hr>
        <p>Added: <?= $art->ReleaseDate ?></p>
        <hr>


        <span class="h4">User Rating</span>

        <?php

        $rating = Review::averageReview($art->ArtworkID);


        echo ShowStars::widget(['rating' => $rating]);


        $countall = Review::countReview($art->ArtworkID)

        ?>
        <p><?= round($rating, 1) ?> average based on <?= $countall ?> reviews.</p>
        <hr>
        <?php


        $orderedArt = Orderartwork::artOrderedByUser($artid);
        $artInCart = Cart::artInCart($artid);
        if ($art->price != null) {
            if ($orderedArt != 0) {
                echo '<div class="alert alert-success text-center">
        You already placed an order for this artwork!
    </div>';

            } elseif ($artInCart != 0) {
                echo '<div class="alert alert-success text-center">
        Item is already in your cart!
    </div>';

            } elseif (Yii::$app->user->isGuest) {
                echo '<div class="alert alert-danger text-center">
        Please Sign in to add to cart
    </div>';
            } else {
                echo '<a href="addtocart?id=' . $artid . '"><p>
        <button>Add to Cart</button>
    </p><a> ';
            }

        }
        ?>
        <br>

        <?php


        $userReviewed = Review::countUserReview($artid);
        if (Yii::$app->user->isGuest) {
            echo '<div class="alert alert-danger text-center">
        Please Sign in to add a review
    </div>';
        } elseif ($userReviewed != 0) {
            echo '<div class="alert alert-success text-center">
        You already reviewed this artwork.
    </div>';
        } else {
            ?>
            <p>
                <button onclick="HideNext2()">Leave a review</button>
            </p>

            <div id="LeaveReview" class="container" style="display: none">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'Rating')->widget(StarRating::classname(), [
                    'pluginOptions' => ['size' => 'm',
                        'min' => 0,
                        'max' => 5,
                        'step' => 1,]
                ])->label('Rating: '); ?>
                <?= $form->field($model, 'UserDescription')->textarea(['rows' => 6])->label("Insert a review here:") ?>
                <?= $form->field($model, 'artworkID')->hiddenInput(['value' => $artid])->label(false); ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?php
        }

        ?>
        <br>
        <p>
            <button onclick="HideNext()">All reviews</button>
        </p>
        <?php
        echo '<div id ="starRateAll" class="container p-4" style="display: none">';
        for ($i = 5; $i > 0; $i--) {
            echo '<div  class="container">';
            echo ShowStars::widget(['rating' => $i]);
            $countnums = Review::countReviewSingle($artid, $i);

            if ($countall != 0) {
                echo "\t" . '- ' . $countnums . ' (' . round(($countnums / $countall * 100), 2) . '%)</div>';
            }

        }
        $review = Review::getUserReviews($artid);
        echo '<div class="container">';
        foreach ($review as $reviewSing) {
            if ($reviewSing['Description'] != null)
                echo '<div class = "row userrev p-2">' . $reviewSing['full_name'] . ': ' . $reviewSing['Description'] . '</div>';
        }


        ?>
    </div>
    <?php

} else
    echo '<div class="alert alert-danger text-center">
This Artwork does not exisit!
</div>';
?>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>

<script>
    function HideNext() {
        var x = document.getElementById("starRateAll");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<script>
    function HideNext2() {
        var x = document.getElementById("LeaveReview");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
