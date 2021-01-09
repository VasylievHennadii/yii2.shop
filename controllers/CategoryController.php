<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category)){
            throw new NotFoundHttpException('Такой категории нет...');
        }

        $this->setMeta("{$category->title} :: " . \Yii::$app->name, $category->keywords, $category->description);

        // $products = Product::find()->where(['category_id' => $id])->all();

        //реализация пагинации
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'category', 'pages'));
    }

}