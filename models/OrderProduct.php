<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of OrderProduct
 * 
 * Mодель для работы с таблицей 'order_product' из БД
 *
 * @author user
 */
class OrderProduct extends ActiveRecord
{
    
    /**
     * метод указывает на таблицу из БД, с которой будем работать
     * 
     * @return string
     */
    public static function tableName() {
        return 'order_product';
    }
    
    /**
     * метод задает массив правил валидации для заполнения таблицы 'order_product' в БД
     * 
     * @return type
     */
     public function rules()
    {
        return [
            [['order_id', 'product_id', 'title', 'price', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * метод заполняет атрибуты модели OrderProduct
     * @param type $products
     * @param type $order_id
     */
    public function saveOrderProducts($products, $order_id){
        foreach ($products as $id => $product){
            $this->id = null;
            $this->isNewRecord = true; //указатель для save(), что сохраняем в новую запись в БД
            $this->order_id = $order_id;
            $this->product_id = $id;
            $this->title = $product['title'];
            $this->price = $product['price'];
            $this->qty = $product['qty'];
            $this->total = $product['qty'] * $product['price'];
            if(!$this->save()){
                return false;
            }
        }
        return true;
    }
    
}
