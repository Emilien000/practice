<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$status = [
    0 => 'Принят',
    1 => 'Готовится',
    2 => 'Подано',
    3 => 'Оплачено',
];

\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            'table_id',
            'clients_count',
            [
                'attribute' => 'waiter_id',
                'value' => $model->waiter->firstname . ' ' . $model->waiter->lastname
            ],
            [
                'attribute' => 'cooker_id',
                'value' => $model->cooker ? $model->cooker->firstname . ' ' . $model->cooker->lastname : 'Отсутствует'
            ],
            'drinks:ntext',
            'foods:ntext',
            [
                'attribute' => 'status',
                'value' => $status[$model->status]
            ],
        ],
    ]) ?>

</div>
