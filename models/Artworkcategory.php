<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artwork_category".
 *
 * @property int $ArtworkID
 * @property int $CategoryID
 *
 * @property Artwork $artwork
 * @property Category $category
 */
class Artworkcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artwork_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArtworkID', 'CategoryID'], 'required'],
            [['ArtworkID', 'CategoryID'], 'integer'],
            [['ArtworkID', 'CategoryID'], 'unique', 'targetAttribute' => ['ArtworkID', 'CategoryID']],
            [['ArtworkID'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['ArtworkID' => 'ArtworkID']],
            [['CategoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['CategoryID' => 'CategoryID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ArtworkID' => Yii::t('app', 'Artwork ID'),
            'CategoryID' => Yii::t('app', 'Category ID'),
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['CategoryID' => 'CategoryID']);
    }
}
