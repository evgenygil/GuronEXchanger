<?php

use app\models\Currencies;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view">
    <h3>Please check your transaction and update or delete it if there are errors</h3>
    <div class="col-lg-4">
    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label' => 'Your IDentifier', 'value' => $model->id],
//            'hash',
            [
                'attribute' => 'currency',
                'label' => 'I have...',
                'value' => function($data) {
                    return Currencies::findOne($data->currency)->value;
                }
            ],
            [
                'attribute' => 'type',
                'label' => 'Want to..',
                'value' => function($data) {
                    return ($data->type == 1) ? 'Sell' : 'Buy';
                }
            ],
            [
                'attribute' => 'currency_chng',
                'label' => 'Some...',
                'value' => function($data) {
                    return Currencies::findOne($data->currency_chng)->value;

                }
            ],
            'value',
            'bank',
            'user',
            'timestamp'
        ],
    ]) ?>

    <?= Html::tag('h3', 'Your requisites: ') ?>

    <?= Html::tag('pre', '
    SBERBANK
    Олим Абдурафикович  Х
    5469 5500 2723 8135', ['style' => 'font-family: Verdana; font-size: 14px; background-color: #FCFCFC; width: 300px'])?>

    <?= Html::a('All OK', ['transaction/create'], ['class' => 'btn btn-primary']) ?>
</div>


</div>
