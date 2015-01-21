<?php

namespace branchonline\widget;

use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * Description of FeedbackForm
 *
 * @author jap
 */
class FeedbackForm extends Model {

    public $subject;
    public $description;

    public function init() {
        parent::init();

        if (!isset(Yii::$app->params['feedback_email'])) {
            throw new Exception('You have supply a [feedback_email] in the params file.');
        }
    }

    public function rules() {
        return [
            [['subject', 'description'], 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'subject' => 'Subject',
            'description' => 'Description',
        ];
    }

    public function sendFeedback() {
        if ($this->validate()) {
             Yii::$app->mailer->compose('feedbackMail', ['subject' => $this->subject, 'description' => $this->description])
                ->setFrom(Yii::$app->params['feedback_email'])
                ->setTo(Yii::$app->params['feedback_email'])
                ->setSubject('Feedback / Error')
                ->send();
             
            return true;
        } else {
            return false;
        }
    }
    

}
