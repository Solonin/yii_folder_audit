<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\cdc\models\CdcfoldersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Папки на O:\Cdc';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cdcfolders-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'folder',
            'adgroup',
            'permission',
//            'dt_time',
            //'ManagedBy',
            [
                'label' => 'Посмотреть доступы',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a(
                        $model->folder,
                        'http://vsolowinang/cdc/cdcfolders/view2?folder='.$model->folder,
                        [
                            'title' => 'Посмотреть доступы',
                            'target' => '_blank'
                        ]
                    );
                }
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
