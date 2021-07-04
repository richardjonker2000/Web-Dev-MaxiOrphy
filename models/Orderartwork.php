<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderartwork".
 *
 * @property int $OrderID
 * @property int $ArtworkID
 * @property float $Amount
 *
 * @property Artwork $artwork
 * @property Order $order
 */
class Orderartwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderartwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OrderID', 'ArtworkID', 'Amount'], 'required'],
            [['OrderID', 'ArtworkID'], 'integer'],
            [['Amount'], 'number'],
            [['OrderID', 'ArtworkID'], 'unique', 'targetAttribute' => ['OrderID', 'ArtworkID']],
            [['ArtworkID'], 'exist', 'skipOnError' => true, 'targetClass' => Artwork::className(), 'targetAttribute' => ['ArtworkID' => 'ArtworkID']],
            [['OrderID'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['OrderID' => 'OrderID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'OrderID' => Yii::t('app', 'Order ID'),
            'ArtworkID' => Yii::t('app', 'Artwork ID'),
            'Amount' => Yii::t('app', 'Amount'),
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
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['OrderID' => 'OrderID']);
    }

    public static function artOrderedByUser($artworkID){
        $temp = Orderartwork::find()

            ->leftJoin('order', '`order`.`OrderID` = `OrderArtwork`.`OrderID`')
            ->where(['=', 'UserID', Yii::$app->user->id])
            ->andWhere(['=', 'ArtworkID', $artworkID])
        ;
        return $temp->count('*');
    }
}
