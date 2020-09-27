<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\intlog\models\IntlogfoldersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Папки на O:\Intlog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intlogfolders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <!--    <? //Html::a('Create Intlogfolders', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'folder',
            'adgroup',
//            'permission',
            'ManagedBy',
            ['attribute' => 'Роль',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:330px;  min-width:250px;  '],
                'value' => function($model){
                    $items = [];
                    foreach($model->rolememberof as $rolememberof){
                        $items[] = $rolememberof->role;
                    }
                    return implode("<br>", $items);
                }],

            [
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
            ],





        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
