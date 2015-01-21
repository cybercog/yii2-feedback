<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="feedback-block">
    <div class="collapse-arrow"></div>
    <div class="title"><?= Yii::t('app', 'Contact') ?></div>
    <p><?= Yii::t('app', 'Error seen? Give feedback? Tell us!') ?></p>
    <div class="collapsable">
        <div id="open-error-form" class="button"><?= Yii::t('app', 'I want to report an error') ?></div>
        <div id="open-feedback-form" class="button"><?= Yii::t('app', 'I want to give feedback') ?></div>
    </div>
</div>

<div id="error-form" class="feedback-modal">
    <div class="close"></div>
    <?php
    $form = ActiveForm::begin([
                'id' => 'feedback-form',
                'action' => $action_url,
            ])
    ?>
    <div class="modal-header"><?= Yii::t('app', 'Error form') ?></div>
    <div class="modal-content">
        <p><?= $p_text ?></p>
        <div class="split pad-right">
            <?= $form->field($form_model, 'subject')->dropDownList($select_choices) ?>
        </div>
        <div class="split pad-left">
            <?= $form->field($form_model, 'description') ?>
        </div>
        
    </div>
    <div class="modal-footer">
         <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn light']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>