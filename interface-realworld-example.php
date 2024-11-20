<?php
// Define the Notification interface
interface Notifiable {
    public function sendNotification($message);
}

// Class implementing the Notifiable interface for Email notifications
class EmailNotifier implements Notifiable {
    public function sendNotification($message) {
        echo "Sending Email: $message<br>";
    }
}

// Class implementing the Notifiable interface for SMS notifications
class SMSNotifier implements Notifiable {
    public function sendNotification($message) {
        echo "Sending SMS: $message<br>";
    }
}

// Class implementing the Notifiable interface for Push notifications
class PushNotifier implements Notifiable {
    public function sendNotification($message) {
        echo "Sending Push Notification: $message<br>";
    }
}

// Usage
$notifiers = [
    new EmailNotifier(),
    new SMSNotifier(),
    new PushNotifier()
];

foreach ($notifiers as $notifier) {
    // $notifier->sendNotification("Hello, this is a test notification!");
}


// EXAMPLE #2

interface Food {
    public function getNutrition(): int;
}

class Sausage implements Food {
    public function getNutrition(): int {
        return 10; // Nutritional value
    }
}

class Fish implements Food {
    public function getNutrition(): int {
        return 15; // Nutritional value
    }
}

class Cat {
    private $energy = 0;

    public function eat(Food $food) {
        $this->energy += $food->getNutrition();
    }

    public function getEnergy(): int {
        return $this->energy;
    }
}

// Usage
$cat = new Cat();
$sausage = new Sausage();
$fish = new Fish();

$cat->eat($sausage); // Cat eats sausage
echo "Cat's energy: " . $cat->getEnergy() .PHP_EOL; // Output: Cat's energy: 10

$cat->eat($fish);    // Cat eats fish
echo "Cat's energy: " . $cat->getEnergy().PHP_EOL; // Output: Cat's energy: 25
