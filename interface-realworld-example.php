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
    $notifier->sendNotification("Hello, this is a test notification!");
}