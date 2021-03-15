<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title =  "Категория: " . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">
                <div class="category-view">

                   <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            //'parent_id',
                            [
                                'attribute'=> 'parent_id',
                                'value' => isset($model->category->title) ? '<a href="' . yii\helpers\Url::to(['category/view', 'id' => $model->category->id]) . '">' .$model->category->title . '</a>' : 'Самостоятельная категория',
                                'format' => 'html',
                            ],
                            'title',
                            'description',
                            'keywords',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>


