<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\intlog\models\Intlogfolders */

//$this->title = $model[1]->folder;
/*$this->params['breadcrumbs'][] = ['label' => 'Intlogfolders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
*/?><!--
<div class="intlogfolders-view">

    <h1><?/*= Html::encode($this->title) */?></h1>

    <p>
        <?/*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>
-->
<!--    --><?//= var_dump($model); ?>
<?php /*\yii\helpers\VarDumper::dump($model, 3, true); */?>


<?php
foreach($model as $val)
{
 /*   echo $_SERVER['AUTH_USER'];
   \yii\helpers\VarDumper::dump($val->rolememberof, 3, true);
    echo '<br>';*/
?>
<div class="alert alert-info" role="alert"><h4 class="alert-heading">
    <p><small>Папка </small><?= $val->folder . '<br><br>';?></p>
        <p><small>Группа доступа </small><?= $val->adgroup . '<br>';?></p></h4>
</div>

<!-- //   echo $val->rolememberof[0] . '<br>';-->

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th style="width: 16.66%" scope="col">Имя</th>
        <th style="width: 14%" scope="col">Фото</th>
        <th style="width: 16.66%" scope="col">Должность</th>
        <th style="width: 18%" scope="col">Департамент</th>
<!--        <th style="width: 25%" scope="col">Роль</th>-->
        <th style="width: 7%" scope="col">Доступ</th>
        <th style="width: 13%" scope="col">Логин</th>
        <th style="width: 16.66%" scope="col">Company</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($val->members as $members) {
//        \yii\helpers\VarDumper::dump($rolememberof->rolemembers, 3, true);
  //      \yii\helpers\VarDumper::dump($members->user, 3, true);
//        echo $members . '<br>';
     //   foreach ($members->user as $user) {
         //   \yii\helpers\VarDumper::dump($user, 3, true);
          //     echo $user . '<br>';
    ?>

            <tr>
                <th scope="row"><?= $members->user->extensionAttribute2;?></th>
                <td><img src="https://intranet.merlion.ru/images/comprofiler/<?= $members->user->EmployeeNumber;?>.jpg" alt="..." class="img-rounded" width=25%></td>
                <td><?= $members->user->title;?></td>
                <td><?= $members->user->department;?></td>
                <!--<td><?/*= Html::a(
                        $rolememberof->role,
                        'http://vsolowinang/intlog/intlogfolders/viewrole?role='.$rolememberof->role,
                        [
                            'title' => 'Посмотреть доступы',
                            'target' => '_blank'
                        ]
                    );*/?></td>-->
<!--                <td>//= $rolememberof->role;</td>-->
                <td><?= $val->permission;?></td>
                <td><?= $members->user->SamAccountName;?></td>
                <td><?= $members->user->company;?></td>
            </tr>
        <!--    <button type="button" class="list-group-item list-group-item-action">
                <?/*= $rolemembers->users->extensionAttribute2; echo ' | ';*/?> <?/*=$rolemembers->users->department; echo ' | ';*/?> <?/*=$rolemembers->users->company; echo ' | ';*/?>
                <?/*=$rolemembers->users->title; echo ' | ';*/?><?/*=$rolemembers->users->state; echo ' | ';*/?><?/*=$rolemembers->users->PrimarySMTPAddress; echo ' | ';*/?>
            </button>-->
    <?php
   //     };
    };
    ?>
    </tbody>
</table>
<?php }; ?>


<!--<div class="list-group">
<?php
/*//    var_dump($val->rolememberof);
//    var_dump($val->users);
    foreach ($val->users as $user) {
       // echo $user->extensionAttribute2 . '<br>';
        */?>

    <button type="button" class="list-group-item list-group-item-action">
        <?/*= $user->extensionAttribute2; echo ' | ';*/?>  <?/*=$user->department; */?>
    </button>



