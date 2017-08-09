<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <h3>Please check your transaction and update or delete it if there are errors</h3>
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
            'hash',
            'currency',
            'value',
            'bank',
            'user',
            'timestamp'
        ],
    ]) ?>
    <?= Html::a('All OK', 'http://guronexchanger/web/index.php?r=transaction%2Fcreate', ['class' => 'btn btn-primary']) ?>

</div>
