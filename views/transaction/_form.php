<?php

use app\models\Currencies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */
/* @var $form yii\widgets\ActiveForm */

$currencyes = ArrayHelper::map(Currencies::find()->orderBy('id')->asArray()->all(), 'id', 'shortcut')

?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::tag('h3', 'Bank information') ?>
    <?= $form->field($model, 'user')->textInput(['maxlength' => true])->label('Full name') ?>
    <?= $form->field($model, 'bank')->textInput(['maxlength' => true])->label('Bank account') ?>
    <?= Html::tag('h3', 'Currency information') ?>
    <?= $form->field($model, 'currency')->dropDownList($currencyes, ['prompt' => 'Specify currency...'])->label('I have...') ?>
    <?= $form->field($model, 'type')->dropDownList(['0' => 'Buy', '1' => 'Sell'], ['prompt' => 'Specify operation...'])->label('Want to...') ?>
    <?= $form->field($model, 'currency_chng')->dropDownList($currencyes, ['prompt' => 'Specify currency...'])->label('... for this currency') ?>
    <?= $form->field($model, 'value')->textInput()->label('Amount')->label('I can give ...') ?>

    <?= Html::tag('h3', 'Please verify your sending data and amount!') ?>
    <br><br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Send request' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
