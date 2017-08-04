<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */
/* @var $form yii\widgets\ActiveForm */

$currencyes = [
    'CNY' => 'CNY',
    'RUB' => 'RUB',
    'EUR' => 'EUR',
    'USD' => 'USD'
];

?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'timestamp')->textInput() ?>
<!--    --><?//= $form->field($model, 'ready')->textInput() ?>
    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'currency')->dropDownList($currencyes, ['prompt' => 'Specify currency...']) ?>
    <?= $form->field($model, 'value')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
