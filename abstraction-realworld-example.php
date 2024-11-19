<?php
// Define an abstract class for Payment
abstract class Payment {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    // Abstract method to process payment
    abstract public function processPayment();

    // Concrete method to get payment amount
    public function getAmount() {
        return $this->amount;
    }
}

// Class extending the abstract class for Credit Card payments
class CreditCardPayment extends Payment {
    public function processPayment() {
        echo "Processing Credit Card payment of $" . $this->getAmount() . "<br>";
    }
}

// Class extending the abstract class for PayPal payments
class PayPalPayment extends Payment {
    public function processPayment() {
        echo "Processing PayPal payment of $" . $this->getAmount() . "<br>";
    }
}

// Usage
$payments = [
    new CreditCardPayment(100),
    new PayPalPayment(150)
];

foreach ($payments as $payment) {
    $payment->processPayment();
}