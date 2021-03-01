<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Order;
use app\modules\admin\models\Product;
use app\modules\admin\models\Category;

/**
 * Description of MainController
 *
 * @author user
 */
class MainController extends AppAdminController {
    
    public function actionIndex(){
        $orders = Order::find()->count();
        $products = Product::find()->count();
        $categories = Category::find()->count();
        return $this->render('index', compact('orders', 'products', 'categories'));
    }    
    
}
