<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $ReviewID
 * @property int $Rating
 * @property string|null $Description
 * @property int|null $CommissionID
 * @property int|null $ArtworkID
 * @property int $UserID
 *
 * @property Artwork $artwork
 * @property Commission $commission
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rating', 'UserID'], 'required'],
            [['Rating', 'CommissionID', 'ArtworkID', 'UserID'], 'integer'],
            [['Description'], 'string', 'max' => 45],
            [['ArtworkID'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['ArtworkID' => 'ArtworkID']],
            [['CommissionID'], 'exist', 'skipOnError' => true, 'targetClass' => Commission::className(), 'targetAttribute' => ['CommissionID' => 'CommissionID']],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ReviewID' => Yii::t('app', 'Review ID'),
            'Rating' => Yii::t('app', 'Rating'),
            'Description' => Yii::t('app', 'Description'),
            'CommissionID' => Yii::t('app', 'Commission ID'),
            'ArtworkID' => Yii::t('app', 'Artwork ID'),
            'UserID' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[Artwork]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtwork()
    {
        return $this->hasOne(Artwork::className(), ['ArtworkID' => 'ArtworkID']);
    }

    /**
     * Gets query for [[Commission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommission()
    {
        return $this->hasOne(Commission::className(), ['CommissionID' => 'CommissionID']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'UserID']);
    }


    public static function averageReview($artworkID)
    {
        return $average = Review::find()->where('review.ArtworkID = ' . $artworkID)->average('rating');
    }

    public static function countReview($artworkID)
    {
        return $count = Review::find()->where('review.ArtworkID = ' . $artworkID)->count();
    }

    public static function countUserReview($artworkID)
    {
        return $count = $countUserReview = Review::find()
            ->select(['Count(*) as countReview'])
            ->where(['=', 'UserID', Yii::$app->user->id])
            ->andWhere(['=', 'ArtworkID', $artworkID])->count();
    }

    public static function countReviewSingle($artid, $stars)
    {
        return Review::find()
            ->where('review.ArtworkID = ' . $artid)
            ->andWhere('review.Rating = ' . $stars)
            ->count('*');
    }

    public static function getUserReviews($artid)
    {
        return Review::find()
            ->select(['{{review}}.*', '{{profile}}.full_name'])
            ->where(['=', 'ArtworkID', $artid])
            ->leftJoin('profile', '`review`.`UserID` = `profile`.`user_id`')
            ->asArray()
            ->all();

    }

}
