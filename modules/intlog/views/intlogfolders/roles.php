<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\intlog\models\IntlogfoldersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роли Intlog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intlogfolders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <!--    <? //Html::a('Create Intlogfolders', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php Pjax::begin(); ?>
<!--    --><?//=        \yii\helpers\VarDumper::dump($dataProvider, 3, true);?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?//= var_dump($model) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'role:text:Роль',
            'memberof:text:Папка',
            //'role1.ManagedBy',
            ['attribute' => 'Ответственный',
                'value' => 'role1.ManagedBy'
                ],
            /*[
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Подробнее',
                'headerOptions' => ['width' => '30'],
                'template' => '{view}',
            ],*/
            [
                'label' => 'Посмотреть доступы',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a(
                        $model->role,
                        'http://vsolowinang/intlog/intlogfolders/viewrole?role='.$model->role,
                        [
                            'title' => 'Посмотреть доступы',
                            'target' => '_blank'
                        ]
                    );
                }
            ],
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
