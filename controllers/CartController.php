<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
use app\models\Product;


/**
 * Description of CartController
 * Контроллер корзины
 * @author user
 */
class CartController extends AppController 
{
    
    /**
     * метод добавления/удаления продуктов в cart из checkout
     */
    public function actionChangeCart()
    {
        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();        
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        return $this->renderPartial('cart-modal', compact('session'));
    }

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
        if(\Yii::$app->request->isAjax){
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
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
    
    /**
     * метод для оформления заказа
     * @return type
     */
    public function actionCheckout()
    {
        $this->setMeta("Оформление заказа :: " . \Yii::$app->name);
        $session = \Yii::$app->session;
        
        $order = new Order();
        $order_product = new OrderProduct();
        if($order->load(\Yii::$app->request->post())){
            /*добавление данных в дополнит поля формы*/
            $order->qty = $session['cart.qty'];
            $order->total = $session['cart.sum'];
            
            /*объект для работы с транзакциями*/
            $transaction = \Yii::$app->getDb()->beginTransaction();
            
            /* сохраняем данные для модели Order. Если данные
              не сохранены - откатываем транзакцию. Else - выполняем транзакцию */
            if(!$order->save() || !$order_product->saveOrderProducts($session['cart'], $order->id)){
                \Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
                $transaction->rollBack();
            } else {
                $transaction->commit();
                \Yii::$app->session->setFlash('success', 'Заказ принят. Ожидайте звонка менеджера');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }            
        }
        
        return $this->render('checkout', compact('session', 'order', 'order_product'));
    }
    
}
