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

    
}
