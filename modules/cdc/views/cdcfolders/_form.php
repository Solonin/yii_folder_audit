<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cdc\models\Cdcfolders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cdcfolders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'folder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dt_time')->textInput() ?>

    <?= $form->field($model, 'ManagedBy')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
