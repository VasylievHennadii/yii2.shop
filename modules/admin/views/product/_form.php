<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">            
            <?= \app\components\MenuWidget::widget([
                'tpl' => 'select_product',
                'model' => $model,
                'cache_time' => 0,
            ]) ?>
        </select>
    </div>

    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?php 
//        echo $form->field($model, 'content')->widget(CKEditor::class,[
//            'editorOptions' => [
//                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//                'inline' => false, //по умолчанию false
//            ],
//        ]);
    ?>
    
    <?php 
        echo $form->field($model, 'content')->widget(CKEditor::class, [          
            'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'],[/* Some CKEditor Options */]), 
        ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_offer')->dropDownList(['0' => 'Нет', '1' => 'Да']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
