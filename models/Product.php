<?php

class Product
{
    public $name = '';
    public $price = 0;
    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function validate()
    {
        //TODO: тут валидация
        return true;
    }

    public function save()
    {
        //чтение 
        $file_content = file_get_contents('products.json');

        try {
            $products = json_decode($file_content, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            //Отправка сообщения в систему журналирования ошибок - bad choice,
            //Попытаться исправить json, если это возможно - good choice.
            throw $e;
        }

        //запись
        $fd = fopen('products.json', 'w');
        $products[] = [
            'id' => array_key_last($products) + 2,
            'name' => $this->name,
            'price' => $this->price
        ];
        fwrite($fd, json_encode($products));
        fclose($fd);
    }
}