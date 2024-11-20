<?php


// First, let's look at the inheritance approach (problematic)
class Animal {
    public function eat() {
        return "Eating...";
    }
    
    public function sleep() {
        return "Sleeping...";
    }
}

class Bird extends Animal {
    public function fly() {
        return "Flying...";
    }
}

class Penguin extends Bird {
    // Problem: Penguins inherit fly() but they can't actually fly!
    public function fly() {
        throw new Exception("Help! Penguins can't fly!");
    }
}


// Now let's solve this using composition
interface MovementBehavior {
    public function move(): string;
}

class FlyingBehavior implements MovementBehavior {
    public function move(): string {
        return "Flying through the air...";
    }
}

class WalkingBehavior implements MovementBehavior {
    public function move(): string {
        return "Walking on land...";
    }
}

class SwimmingBehavior implements MovementBehavior {
    public function move(): string {
        return "Swimming in water...";
    }
}

class AnimalComposition {
    private $movementBehavior;
    
    public function __construct(MovementBehavior $movementBehavior) {
        $this->movementBehavior = $movementBehavior;
    }
    
    public function move() {
        return $this->movementBehavior->move();
    }
    
    public function setMovementBehavior(MovementBehavior $movementBehavior) {
        $this->movementBehavior = $movementBehavior;
    }
    
    public function eat() {
        return "Eating...";
    }
    
    public function sleep() {
        return "Sleeping...";
    }
}

// Using composition
$eagle = new AnimalComposition(new FlyingBehavior());
$penguin = new AnimalComposition(new WalkingBehavior());

// Example usage
echo "Eagle: " . $eagle->move() . "\n";  // Output: Eagle: Flying through the air...
echo "Penguin: " . $penguin->move() . "\n";  // Output: Penguin: Walking on land...

// Penguin goes into water
$penguin->setMovementBehavior(new SwimmingBehavior());
echo "Penguin in water: " . $penguin->move() . "\n";  // Output: Penguin in water: Swimming in water...