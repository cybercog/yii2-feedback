<?php

namespace branchonline\widget;

use app\components\widgets\FeedbackWidget\FeedbackAsset;
use Yii;
use yii\base\Widget;
use yii\db\Exception;

/**
 * Description of ContactWidget
 *
 * @author jap
 */
class FeedbackWidget extends Widget {

    public $p_text = 'Default text';
    public $feedback_select_choices= ['default'];
    public $action_url = '/site/feedback';
    
    public function init() {
        parent::init();
        $this->initVariables();
        $this->registerAssets();
    }

    public function run() {
        $form_model = new FeedbackForm();
        
        return $this->render('feedback_block', [
            'form_model' => $form_model,
            'p_text' => $this->p_text,
            'select_choices' => $this->feedback_select_choices,
            'action_url' => $this->action_url,
        ]);
    }
    
    public function initVariables() {
        $this->p_text = isset(Yii::$app->params['feedback_p_text']) ? Yii::$app->params['feedback_p_text'] : $this->p_text;
        $this->feedback_select_choices = isset(Yii::$app->params['feedback_select_choices']) ? Yii::$app->params['feedback_select_choices'] : $this->feedback_select_choices;
        if(!is_array($this->feedback_select_choices)) {
            throw new Exception('[$feedback_select_choices] should be an array!');
        }
        $this->action_url = isset(Yii::$app->params['feedback_action_url']) ? Yii::$app->params['feedback_action_url'] : $this->action_url;
    }

    public function registerAssets() {
        $view = $this->getView();
        FeedbackAsset::register($view);
    }

}
