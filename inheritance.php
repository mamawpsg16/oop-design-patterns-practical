<?php
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return "Animal sound";
    }
}

// Dog class inherits from Animal
class Dog extends Animal {
    public function speak() {
        return "Woof! My name is " . $this->name;
    }
}

$dog = new Dog("Buddy");
echo $dog->speak(); // Displays: Woof! My name is Buddy