<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $ImageID
 * @property string $ImageURL
 * @property int $ArtworkID
 *
 * @property Artwork $artwork
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ImageURL', 'ArtworkID'], 'required'],
            [['ArtworkID'], 'integer'],
            [['ImageURL'], 'string', 'max' => 100],
            [['ArtworkID'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['ArtworkID' => 'ArtworkID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ImageID' => Yii::t('app', 'Image ID'),
            'ImageURL' => Yii::t('app', 'Image Url'),
            'ArtworkID' => Yii::t('app', 'Artwork ID'),
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
}
