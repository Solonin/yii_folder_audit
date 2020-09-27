<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\intlog\models\Intlogfolders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Intlogfolders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="intlogfolders-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'folder',
            'adgroup',
            'permission',
            'dt_time',
            ['attribute' => 'Роли',
                'value' => function($model){
                    $items = [];
                    foreach($model->rolememberof as $rolememberof){
                        $items[] = $rolememberof->role;
                    }
                    return implode(", ", $items);
                }],
            ['attribute' => 'Пользователи',
                'value' => function($model){
                    $items = [];
                    foreach($model->rolemembers as $rolemembers){
                        $items[] = $rolemembers->memberSAM;
                    }
                    return implode(", ", $items);
                }],
           /* ['attribute' => 'Пользователи детально',
                'value' => 'rolemembers.users.extensionAttribute2'
            ],
            'users.extensionAttribute2',
           */ ['attribute' => 'Пользователи детально',
                'value' => function($model){
                    $items = [];
                    foreach($model->users as $users){
                        $items[] = $users->extensionAttribute2;
                    }
                    return implode(", ", $items);
                }],
        ],
    ]) ?>

</div>
