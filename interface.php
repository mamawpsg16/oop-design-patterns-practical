<?php
// Define an interface
interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

// Class implementing the interface
class Car implements Vehicle {
    public function startEngine() {
        return "Car engine started.";
    }

    public function stopEngine() {
        return "Car engine stopped.";
    }
}

// Another class implementing the same interface
class Motorcycle implements Vehicle {
    public function startEngine() {
        return "Motorcycle engine started.";
    }

    public function stopEngine() {
        return "Motorcycle engine stopped.";
    }
}

// Create instances of Car and Motorcycle
$car = new Car();
echo $car->startEngine(); // Outputs: Car engine started.
echo "<br>";
echo $car->stopEngine(); // Outputs: Car engine stopped.
echo "<br>";

$motorcycle = new Motorcycle();
echo $motorcycle->startEngine(); // Outputs: Motorcycle engine started.
echo "<br>";
echo $motorcycle->stopEngine(); // Outputs: Motorcycle engine stopped.