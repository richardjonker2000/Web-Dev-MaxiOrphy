<?php


namespace app\models;

use Yii;
use yii\base\Model;

class aboutForm extends Model
{

    public $name;
    public $email;
    public $message;

    public function rules()
    {
        return [
            [['name','email', 'message' ], 'required'],
            ['email', 'email'],
        ];
    }
    public function aboutMail(){
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('maxi942design@gmail.com')
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject('Contact Us-MaxiOrphy')
                ->setHtmlBody('Client:'.$this->name.'('.$this->email.')<br>Description:<br>'.$this->message)
                ->send();

            return true;
        }
        return false;
    }
}