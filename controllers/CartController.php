<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;

/**
 * Description of CartController
 * Контроллер корзины
 * @author user
 */
class CartController extends AppController 
{
    
    /**
     * метод добавления товара в корзину
     * @param type $id
     */
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }
//        открываем сессию
        $session = \Yii::$app->session;
        $session->open();
        
        $cart = new Cart();
        $cart->addToCart($product);
        
//        поверяем пришел ли запрос аяксом
        if(\Yii::$app->request->isAjax){
//            рендерим именованный вид без шаблона, только вид
            return $this->renderPartial('cart-modal', compact('session'));
        }
//        если не аяксом, возвращаем пользователя на ту же страницу, с которой пришел
        return $this->redirect(\Yii::$app->request->referrer);        
    }
    
    /**
     * метод вывода корзины
     * @return type
     */
    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart-modal', compact('session'));
    }
    
    /**
     * метод удаления одного товара из корзины
     */
    public function actionDelItem()
    {
        $id = \Yii::$app->request->get('id');
        $session = \Yii::$app->session;
        $session->open();        
        $cart = new Cart();
        $cart->recalc($id);
        return $this->renderPartial('cart-modal', compact('session'));
    }
    
    /**
     * метод очистки корзины (удалить все товары)
     */
    public function actionClear()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }
    
}
