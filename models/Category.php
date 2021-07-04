<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $CategoryID
 * @property string $Name
 * @property string $Description
 *
 * @property ArtworkCategory[] $artworkCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Description'], 'required'],
            [['Name'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CategoryID' => Yii::t('app', 'Category ID'),
            'Name' => Yii::t('app', 'Name'),
            'Description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[ArtworkCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtworkCategories()
    {
        return $this->hasMany(ArtworkCategory::className(), ['CategoryID' => 'CategoryID']);
    }

    public static function getNameAsArray(){
        $query=Category::find();
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'CategoryID', 'Name');
        return($data);
    }
    public static function getAllAsArray(){
        $query=Category::find()
            ->orderBy([
                'Name' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'CategoryID', 'Name');
        return($data);
    }

    public static function getArtworkCategory($artworkID){
        $cats = Category::find()
            ->select('Name')
            ->rightJoin('artwork_category', '`artwork_category`.`CategoryID` = `Category`.`CategoryID`')
            ->where('artwork_category.ArtworkID = ' . $artworkID)
            ->asArray()
            ->all();

        $count = 0;
        $categories = '';
        foreach ($cats as $artCategories) {
            if ($count != 0)
                $categories = $categories.', ';
            $categories = $categories. $artCategories['Name'];
            $count++;
        }
        return $categories;
    }



}
