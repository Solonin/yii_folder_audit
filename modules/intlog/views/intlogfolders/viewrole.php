<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\DatePicker;
use yii\grid\GridView;

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
<!--    --><?//= var_dump($model2); ?>
<?php //\yii\helpers\VarDumper::dump($model, 3, true); ?>

<div class="alert alert-info" role="alert"><h4 class="alert-heading">
        <p><small>Роль </small><?= $model[0]->role . '<br><br>';?></p>
        <p><small>Папки </small></p>

<?php
    $arr = array();
    foreach($model as $val)
    {
       // \yii\helpers\VarDumper::dump($val->folder1->folder, 3, true);
        //var_dump($val->memberof);
        $arr[] = $val->memberof;
        //$arr[] = $val->folder1->folder;
    };
    asort($arr);

    foreach($arr as $arr1)
    {

        echo $arr1 . '<br>';
        /*echo Html::a(
                $arr1,
                'http://vsolowinang/intlog/intlogfolders/view2?folder='.$arr1,
                [
                    'title' => 'Посмотреть доступы',
                    'target' => '_blank'
                ]
            ) . '<br>';*/


    }

?>

</h4></div>

<?php
/*foreach($model2 as $val)
{
    echo $val->memberSAM . '<br>';
};


*/?>



<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th style="width: 16.66%" scope="col">Имя</th>
        <th style="width: 14%" scope="col">Фото</th>
        <th style="width: 16.66%" scope="col">Должность</th>
        <th style="width: 18%" scope="col">Департамент</th>
        <th style="width: 18%" scope="col">Company</th>
<!--        <th style="width: 25%" scope="col">Роль</th>-->
        <th style="width: 13%" scope="col">Логин</th>

    </tr>
    </thead>
    <tbody>
    <?php

    //        \yii\helpers\VarDumper::dump($rolememberof->rolemembers, 3, true);
    //echo $rolememberof->role . '<br>';
    foreach ($model2 as $rolemembers) {
        //   echo $rolemembers->users->extensionAttribute2 . '<br>';
        ?>

        <tr>
            <th scope="row"><?= $rolemembers->users->extensionAttribute2;?></th>
            <td><img src="https://intranet.merlion.ru/images/comprofiler/<?= $rolemembers->users->EmployeeNumber;?>.jpg" alt="..." class="img-rounded" width=20%></td>
            <td><?= $rolemembers->users->title;?></td>
            <td><?= $rolemembers->users->department;?></td>
            <td><?= $rolemembers->users->company;?></td>
<!--            <td> $rolemembers->role;</td>-->
            <td><?= $rolemembers->users->SamAccountName;?></td>

        </tr>
        <!--    <button type="button" class="list-group-item list-group-item-action">
                <?/*= $rolemembers->users->extensionAttribute2; echo ' | ';*/?> <?/*=$rolemembers->users->department; echo ' | ';*/?> <?/*=$rolemembers->users->company; echo ' | ';*/?>
                <?/*=$rolemembers->users->title; echo ' | ';*/?><?/*=$rolemembers->users->state; echo ' | ';*/?><?/*=$rolemembers->users->PrimarySMTPAddress; echo ' | ';*/?>
            </button>-->
        <?php

    };
    ?>
    </tbody>
</table>






<!--/*= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],


        'role:text:Роль',
        'memberof:text:Папка',
        ['attribute' => 'Пользователи',
            'value' => function($model){
                $items = [];
                foreach($model->rolemembers as $rolemembers){
                    $items[] = $rolemembers->memberSAM;
                }
                return implode(", ", $items);
            }],
        ['attribute' => 'Пользователи детально',
            'value' => function($model){
                $items = [];
                foreach($model->users as $users){
                    $items[] = $users->extensionAttribute2;
                }
                return implode(", ", $items);
            }],
        //'role1.ManagedBy',




    ],
]); */

-->



