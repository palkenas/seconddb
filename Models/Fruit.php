<?php
class Fruit
{
    public $id;
    public $fruit;
    public $color;
    public $taste;
    public $price;

    public function __construct($id, $fruit, $color, $taste, $price, $weight)
    {
        $this->id = $id;
        $this->fruit = $fruit;
        $this->color = $color;
        $this->taste = $taste;
        $this->price = $price;
        $this->weight = $weight;
    }
    public static function save($conn){
        print_r($conn);
        $stmt = $conn->prepare("INSERT INTO fruits (fruit, color, taste, price, weight) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$_POST ['fruit'], $_POST ['color'], $_POST ['taste'], $_POST ['price'], $_POST ['weight'],);
        $stmt->execute();
        $stmt->close();
        $conn->close();    
    }
}
