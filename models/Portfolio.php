<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Portfolio extends Model
{
    public $date;//asc or desc or 0
    public $cat;// cat id
    public $rating; //returns asc or desc or 0
    public $searchText;//string need ot be bind

    public function rules()
    {
        return [

            [['date', 'searchText', 'cat', 'rating'], 'safe']


        ];
    }

    public function setCategory($category)
    {
        $this->cat = $category;
    }

    public function query()
    {
        if ($this->validate()) {
            $db = \Yii::$app->db;
            $art = Artwork::find()
                ->select([
                    '{{artwork}}.*',
                    'AVG({{review}}.rating) AS AverageReview'
                ])
                ->leftJoin('review', '`review`.`ArtworkID` = `Artwork`.`ArtworkID`')
                ->leftJoin('artwork_category', '`artwork_category`.`ArtworkID` = `Artwork`.`ArtworkID`')
            ->groupBy('Artwork.ArtworkID');

            if ($this->searchText) {
                $art->andWhere(['like', 'Name', $this->searchText]);
            }
            if ($this->cat) {
                $art->andWhere(['=', 'artwork_category.CategoryID', $this->cat]);
            }

            switch ($this->date) {
                case 'ASC':
                    $art->orderBy('ReleaseDate ASC');
                    break;
                case 'DESC':
                    $art->orderBy('ReleaseDate DESC');
                    break;
            }
            switch ($this->rating) {
                case 'ASC':

                    $art->orderBy('AverageReview ASC');
                    break;
                case 'DESC':
                    $art->orderBy('AverageReview DESC');
                    break;
            }
            return $art;
        }
        return false;
    }


}