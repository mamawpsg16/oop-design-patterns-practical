<?php
// Define an abstract class
abstract class Animal {
    protected $name;

    // Constructor to set the name
    public function __construct($name) {
        $this->name = $name;
    }

    // Abstract method - must be implemented by subclasses
    abstract public function makeSound();

    // Concrete method - can be used by subclasses
    public function getName() {
        return $this->name;
    }
}

// Subclass extending the abstract class
class Dog extends Animal {
    public function makeSound() {
        return "Woof! My name is " . $this->getName();
    }
}

// Another subclass extending the abstract class
class Cat extends Animal {
    public function makeSound() {
        return "Meow! My name is " . $this->getName();
    }
}

// Create instances of Dog and Cat
$dog = new Dog("Buddy");
echo $dog->makeSound(); // Outputs: Woof! My name is Buddy
echo "<br>";

$cat = new Cat("Whiskers");
echo $cat->makeSound(); // Outputs: Meow! My name is Whiskers