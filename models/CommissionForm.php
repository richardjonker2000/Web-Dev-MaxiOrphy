<?php


namespace app\models;

use Yii;
use yii\base\Model;

class CommissionForm extends Model
{
    public $name;
    public $email;
    public $description;
    public $category;
    public $quantity;
    public $priority;

    public function rules()
    {
        return [
            [['name', 'email', 'description', 'category','quantity', 'priority'], 'required'],
            [['category'], 'compare',  'compareValue' => 0, 'operator' => '!=', 'type' => 'number', 'message'=> 'Please select a category'],

            ['email', 'email'],
        ];
    }

    public function commissionMail()
    {
        if ($this->validate()) {
            $cattext = '';
            switch ($this->category) {
                case 1:
                    $cattext = 'Overlay';
                    break;
                case 2:
                    $cattext = 'Emotes';
                    break;
                case 3:
                    $cattext = 'Panel';
                    break;
                case 4:
                    $cattext = 'Artwork';
                    break;
            }
            if ($this->quantity == 0) {
                $description = 'Client:' . $this->name . '(' . $this->email . ')<br>Priority:'.$this->priority.'<br>Category:' . $cattext . '<br>Description:<br>' . $this->description;
            } else {
                $quantText = '';
                switch ($this->quantity) {
                    case 1:
                        $quantText = '1-3';
                        break;
                    case 2:
                        $quantText = '4-5';
                        break;
                    case 3:
                        $quantText = '6-9';
                        break;
                    case 4:
                        $quantText = '10+';
                        break;
                }
                $description = 'Client:' . $this->name . '(' . $this->email .')<br>Priority:'.$this->priority.'<br>Category:'. $cattext . '<br>Quantity:' . $quantText . '<br>Description:<br>' . $this->description;
            }
            Yii::$app->mailer->compose()
                ->setTo('maxiorphy@gmail.com')
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject('Commission-MaxiOrphy')
                ->setHtmlBody($description)
                ->send();

            $commission = new Commission();
            $commission->Description = $this->description;
            $commission->Priority = $this->priority;
            $commission->Status = 'Pending';
            $commission->UserID = Yii::$app->user->id;
            $commission->save();

            return true;
        }
        return false;
    }
}