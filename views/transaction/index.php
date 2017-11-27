<?php

use app\models\Currencies;
use app\models\Transaction;
use yii\bootstrap\Collapse;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="transaction-index row col-lg-12">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php

    if (Yii::$app->user->isGuest) {
        echo "Sorry you can't see this";
    } else {

    if(Yii::$app->request->get('idct') && Yii::$app->request->get('action') == 'confirm'){
        $m = Transaction::findOne(Yii::$app->request->get('idct'));
        if ($m->ready == 0) {
            $m->ready = 1;
            $m->save();
        }
    }

    ?>

    <div class="site-about">
        <h4>Transactions to confirm:</h4>
    </div>

    <?php



        echo GridView::widget([
            'dataProvider' => $unconfirmedTransactions,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-condensed table-striped medium',
            ],
            'columns' => [
                'id',
                'hash',
                [
                    'attribute' => 'currency',
                    'label' => 'From',
                    'value' => function($data) {
                        return Currencies::findOne($data->currency)->value;
                    }
                ],
                [
                    'attribute' => 'type',
                    'label' => 'Act',
                    'value' => function($data) {
                        return ($data->type == 1) ? 'Sell' : 'Buy';
                    }
                ],
                [
                    'attribute' => 'currency_chng',
                    'label' => 'To',
                    'value' => function($data) {
                        return Currencies::findOne($data->currency_chng)->value;

                    }
                ],
                'value',
                'bank',
                'user',
                'timestamp',
//                'ready',
                [
                    'class' => \yii\grid\ActionColumn::class,
                    'header' => '',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-ok-circle"></span>', '/transaction/index?action=confirm&idct=' . $model->id, []);
                        },
                    ]
                ],
            ],
        ]);

        echo Collapse::widget([
            'items' => [
                [
                    'label' => 'Show confirmed transactions.',
                    'content' => GridView::widget([
                        'dataProvider' => $confirmedTransactions,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-condensed table-striped medium',
                            ],
                        'columns' => [
                            'id',
                            'hash',
                            [
                                'attribute' => 'currency',
                                'label' => 'From',
                                'value' => function($data) {
                                    return Currencies::findOne($data->currency)->value;
                                }
                            ],
                            [
                                'attribute' => 'type',
                                'label' => 'Act',
                                'value' => function($data) {
                                    return ($data->type == 1) ? 'Sell' : 'Buy';
                                }
                            ],
                            [
                                'attribute' => 'currency_chng',
                                'label' => 'To',
                                'value' => function($data) {
                                    return Currencies::findOne($data->currency_chng)->value;

                                }
                            ],
                            'value',
                            'bank',
                            'user',
                            'timestamp'
                        ],
                    ]),
                    'contentOptions' => [],
                    'options' => []
                ],
            ]
        ]);
    }

    ?>
</div>
</div>
