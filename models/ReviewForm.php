<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

class ReviewForm extends Model
{


    public $artworkID;
    public $UserDescription;
    public $Rating;


    public function rules()
    {
        return [
            [['Rating'], 'required'],
            [['UserDescription', 'artworkID'], 'safe']
        ];
    }


    public function addReview()
    {
        if ($this->validate()) {

            $review = new Review();
            $review->UserID = Yii::$app->user->id;
           $review->Description = $this->UserDescription;
           $review->Rating = $this->Rating;
           $review->ArtworkID = $this->artworkID;
            $review->save();
            
        }
    }

    public function setArtwork($artID){
        $this->artworkID = $artID;
    }


}