<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property int $OrderID
 * @property string $DateTime
 * @property string $Status
 * @property int $UserID
 *
 * @property User $user
 * @property Orderartwork[] $orderartworks
 * @property Artwork[] $artworks
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DateTime', 'Status', 'UserID'], 'required'],
            [['DateTime'], 'safe'],
            [['UserID'], 'integer'],
            [['Status'], 'string', 'max' => 45],
            [['UserID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UserID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'OrderID' => Yii::t('app', 'Order ID'),
            'DateTime' => Yii::t('app', 'Date Time'),
            'Status' => Yii::t('app', 'Status'),
            'UserID' => Yii::t('app', 'User ID'),
        ];
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

    /**
     * Gets query for [[Orderartworks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderartworks()
    {
        return $this->hasMany(Orderartwork::className(), ['OrderID' => 'OrderID']);
    }

    /**
     * Gets query for [[Artworks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArtworks()
    {
        return $this->hasMany(Artwork::className(), ['ArtworkID' => 'ArtworkID'])->viaTable('orderartwork', ['OrderID' => 'OrderID']);
    }

    public static function getAllAsArray()
    {
        $query = Order::find()
            ->orderBy([
                'OrderID' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data = ArrayHelper::map($items, 'OrderID', 'OrderID');
        return ($data);
    }

    public static function makeOrder()
    {
        $order = new Order();
        $order->UserID = Yii::$app->user->id;
        $order->Status = 'Payment Pending';
        $date = new \DateTime('now');
        $order->DateTime = date_format($date, 'Y-m-d H:i:s');
        $order->save();

        $cart = Cart::find()
            ->select(['{{Artwork}}.*', '{{Cart}}.*'])
            ->where(['=', 'UserID', Yii::$app->user->id])
            ->leftJoin('Artwork', '`cart`.`ArtworkID` = `Artwork`.`ArtworkID`')
            ->asArray()
            ->all();
        foreach ($cart as $cartart) {
            $orderart = new Orderartwork();
            $orderart->OrderID = $order->OrderID;
            $orderart->ArtworkID = $cartart['ArtworkID'];
            $orderart->Amount = $cartart['price'];
            $orderart->save();
        }
        Cart::deleteAll(['=', 'userID', Yii::$app->user->id]);

    }
}
