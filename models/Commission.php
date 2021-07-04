<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "commission".
 *
 * @property int $CommissionID
 * @property string $Description
 * @property string $Status
 * @property int $Priority
 * @property int $UserID
 *
 * @property User $user
 * @property Review[] $reviews
 */
class Commission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Description', 'Status', 'Priority', 'UserID'], 'required'],
            [['Priority', 'UserID'], 'integer'],
            [['Description'], 'string', 'max' => 250],
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
            'CommissionID' => Yii::t('app', 'Commission ID'),
            'Description' => Yii::t('app', 'Description'),
            'Status' => Yii::t('app', 'Status'),
            'Priority' => Yii::t('app', 'Priority'),
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
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['CommissionID' => 'CommissionID']);
    }
    public static function getAllAsArray(){
        $query=Commission::find()
            ->orderBy([
                'Description' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'CommissionID', 'Description');
        return($data);
    }

    public static function reviewed($comID){
        $com = Commission::findOne($comID);
        return ($com->reviews != null);
    }
}
