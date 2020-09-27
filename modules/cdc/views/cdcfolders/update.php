<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cdc\models\Cdcfolders */

$this->title = 'Update Cdcfolders: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cdcfolders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cdcfolders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
