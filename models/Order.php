<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Mодель для работы с таблицей 'orders' из БД
 * 
 * @author user
 */
class Order extends ActiveRecord
{
    /**
     * метод указывает на таблицу из БД, с которой будем работать
     * 
     * @return string
     */
    public static function tableName() {
        return 'orders';
    }
    
    /**
     * метод позволяет автоматически обновлять атрибуты с метками времени 'created_at', 'updated_at'
     * 
     * @return type
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * метод задает правила валидации данных формы
     * 
     * @return type
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            ['qty', 'integer'],
            ['total', 'number'],
            ['status', 'boolean'],
        ];
    }

    /**
     * метод задает название полей формы
     * 
     * @return type
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
        ];
    }

}
