<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "artwork".
 *
 * @property int $ArtworkID
 * @property string $Name
 * @property string $Description
 * @property string $ReleaseDate
 * @property string $Size
 * @property float|null $price
 *
 * @property ArtworkCategory[] $artworkCategories
 * @property Cart[] $carts
 * @property Images[] $images
 * @property Orderartwork[] $orderartworks
 * @property Review[] $reviews
 */
class Artwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Description', 'ReleaseDate', 'Size'], 'required'],
            [['ReleaseDate'], 'safe'],
            [['price'], 'number'],
            [['Name', 'Size'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ArtworkID' => Yii::t('app', 'Artwork ID'),
            'Name' => Yii::t('app', 'Name'),
            'Description' => Yii::t('app', 'Description'),
            'ReleaseDate' => Yii::t('app', 'Release Date'),
            'Size' => Yii::t('app', 'Size'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * Gets query for [[ArtworkCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtworkCategories()
    {
        return $this->hasMany(ArtworkCategory::className(), ['ArtworkID' => 'ArtworkID']);
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['ArtworkID' => 'ArtworkID']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['ArtworkID' => 'ArtworkID']);
    }
    public function getImage()
    {
        return $this->hasOne(Images::className(), ['ArtworkID' => 'ArtworkID']);
    }

    /**
     * Gets query for [[Orderartworks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderartworks()
    {
        return $this->hasMany(Orderartwork::className(), ['ArtworkID' => 'ArtworkID']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['ArtworkID' => 'ArtworkID']);
    }

    public static function getArtAsArray(){

    }
    public static function getAllAsArray(){
        $query=Artwork::find()
            ->orderBy([
                'Name' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'ArtworkID', 'Name');
        return($data);
    }

    public static function getAllAsArrayWithPrice(){
        $query=Artwork::find()
            ->where('artwork.price is not null')
            ->orderBy([
                'Name' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'ArtworkID', 'Name');
        return($data);
    }

    public static function getFirstImageURL($artworkID){
        $art = Artwork::findOne($artworkID);
        return $art->images[0]->ImageURL;
    }

}
