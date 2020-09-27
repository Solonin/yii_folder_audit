<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\intlog\models\IntlogfoldersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intlogfolders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <!--    <? //Html::a('Create Intlogfolders', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?//= var_dump($dataProvider) ?>
<!--    --><?//=        \yii\helpers\VarDumper::dump($dataProvider, 3, true);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'extensionAttribute2:text:Имя',
            'title:text:Должность',
            'department:text:Департамент',
//            'adgroup:text:Группа',

            ['attribute' => 'Доступ в папку',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:430px;  min-width:350px;  '],
                'value' => function($model){
                    $items = [];
                    foreach($model->adgroupmembers as $adgroupmembers){
                        $items[] = Html::a(
                            $adgroupmembers->folder->folder,
                            'http://vsolowinang/cdc/cdcfolders/view2?folder='.$adgroupmembers->folder->folder,
                            [
                                'title' => 'Посмотреть доступы',
                                'target' => '_blank'
                            ]
                        );
                    }
                    return implode("<br>", $items);
                }],


      /*      ['attribute' => 'Роль',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:330px;  min-width:250px;  '],
                'value' => function($model){
                    $items = [];
                    foreach($model->rolemembers as $rolemembers){
                        $items[] = $rolemembers->role;
                    }
                    return implode("<br>", $items);
                }],*/


           /* [
                'label' => 'Посмотреть доступы',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a(
                        $model->folder,
                        'http://vsolowinang/intlog/intlogfolders/view2?folder='.$model->folder,
                        [
                            'title' => 'Посмотреть доступы',
                            'target' => '_blank'
                        ]
                    );
                }
            ],*/

//            //'role1.ManagedBy',
//            ['attribute' => 'Ответственный',
//                'value' => 'role1.ManagedBy'
//                ],
//            /*[
//                'class' => 'yii\grid\ActionColumn',
//                'header'=>'Подробнее',
//                'headerOptions' => ['width' => '30'],
//                'template' => '{view}',
//            ],*/
//            [
//                'label' => 'Посмотреть доступы',
//                'format' => 'raw',
//                'value' => function($model){
//                    return Html::a(
//                        $model->role,
//                        'http://vsolowinang/intlog/intlogfolders/viewrole?role='.$model->role,
//                        [
//                            'title' => 'Посмотреть доступы',
//                            'target' => '_blank'
//                        ]
//                    );
//                }
//            ],
            /*['class' => 'yii\grid\ActionColumn'],*/
            /*['attribute' => 'Ответственный',
                'value' => function($model){
                    $items = [];
                    foreach($model->role as $role){
                        $items[] = $role->ManagedBy;
                    }
                    return implode(", ", $items);
                }],*/




        ],
    ]); ?>



    <?php Pjax::end(); ?>

</div>
