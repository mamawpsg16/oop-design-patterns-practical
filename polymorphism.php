<?php
interface ShapeInterface {
    public function getArea();
}

class Square implements ShapeInterface {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function getArea() {
        return $this->side * $this->side;
    }
}

class Rectangle implements ShapeInterface {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}

function printArea(ShapeInterface $shape) {
    echo "Area: " . $shape->getArea() . "<br>";
}

$square = new Square(4);
$rectangle = new Rectangle(4, 6);

printArea($square);     // Displays area of square
printArea($rectangle);  // Displays area of rectangle
