<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cdc\models\Cdcfolders */

$this->title = 'Create Cdcfolders';
$this->params['breadcrumbs'][] = ['label' => 'Cdcfolders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cdcfolders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
