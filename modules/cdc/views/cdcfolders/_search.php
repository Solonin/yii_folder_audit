<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cdc\models\CdcfoldersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cdcfolders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'folder') ?>

    <?= $form->field($model, 'adgroup') ?>

    <?= $form->field($model, 'permission') ?>

    <?= $form->field($model, 'dt_time') ?>

    <?php // echo $form->field($model, 'ManagedBy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
