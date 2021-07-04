<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $ArtworkID
 * @property int $UserID
 *
 * @property Artwork $artwork
 * @property User $user
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArtworkID', 'UserID'], 'required'],
            [['ArtworkID', 'UserID'], 'integer'],
            [['ArtworkID', 'UserID'], 'unique', 'targetAttribute' => ['ArtworkID', 'UserID']],
            [['ArtworkID'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['ArtworkID' => 'ArtworkID']],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'UserID']);
    }

    public static function artInCart($artid)
    {
        return Cart::find()
            ->where(['=', 'UserID', Yii::$app->user->id])
            ->andWhere(['=', 'ArtworkID', $artid])
            ->count('*');

    }
}
