<?php

namespace app\models;

use yii\base\Model;

/*
 * Array(
 *      ['cart'] => [
 *          [2] => [
 *              'title' => 'TITLE',
 *              'price' => 10,
 *              'qty' => 2
 *          ],
 *      ],
 *      'cart.qty' => 2,
 *      'cart.sum' => 20,
 * )
 *
 * */


/**
 * Description of Cart
 * Модель корзины
 * @author user
 */
class Cart extends Model
{
    
    /**
     * метод добавления продукта в корзину
     */
    public function addToCart($product, $qty = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'qty' => $qty,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }
    
    /**
     * метод пересчета корзины по $id удаляемого товара
     * удаляет из сессии нужный продукт
     */
    public function recalc($id)
    {
        if(!isset($_SESSION['cart'][$id])){
            return false;
        }
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price']; 
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
    
}
