<?php

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
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php

    if (Yii::$app->user->isGuest) {
        echo "Sorry you can't see this";
    } else {

    if(Yii::$app->request->get('id')){
        $m = Transaction::findOne(Yii::$app->request->get('id'));
        if ($m->ready == 0) {
            $m->ready = 1;
            $m->save();
        }
    }

    ?>

    <div class="site-about">
        <h3>Transactions to confirm:</h3>
    </div>

    <?php



        echo GridView::widget([
            'dataProvider' => $unconfirmedTransactions,
            'filterModel' => $searchModel,
            'columns' => [
                /**
                 * Перечисленные ниже поля модели отображаются как колонки с данными без изменения
                 */
                'id',
                'hash',
                'currency',
                'value',
                'bank',
                'user',
                'timestamp',
                'ready',
                /**
                 * Произвольная колонка с определенной логикой отображения и фильтром в виде выпадающего списка
                 */
                [
                    /**
                     * Указываем класс колонки
                     */
                    'class' => \yii\grid\ActionColumn::class,
                    /**
                     * Определяем набор кнопочек. По умолчанию {view} {update} {delete}
                     */
                    'header' => 'Confirm',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $model) {
//                    return Html::mailto('gil707@gmail.com', 'gil707@gmail.com', []);
                            return Html::a('<img src=./img/tick.png>', 'index.php?r=transaction%2Findex&id=' . $model->id, []);
//                    return \yii\helpers\Html::a('Update', '/set_k',
//                        ['class' => 'send', 'data-id' => $model->id]);
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
                        'columns' => [
                            'id',
                            'hash',
                            'currency',
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
