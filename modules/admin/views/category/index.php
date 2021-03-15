<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">
               <div class="category-index">
    
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            //'parent_id',
                            [
                                'attribute'=> 'parent_id',
                                'value' => function($data){
                        
                                    return $data->category->title ?? 'Самостоятельная категория';  // PHP-7
                         
                                    //return $data->category->title ? $data->category->title : 'Родительская категория';
                                },
                            ],
                            'title',
//                            'description',
//                            'keywords',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>>
</div>


