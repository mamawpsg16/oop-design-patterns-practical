<?php

/**
 * ! Single Responsibility Principle - Every class should have a single responsibility.
 * ! - Each class has a single job.
 */
// 
class EmailNotification
{
    public function send($to, $message)
    {
        // Logic to send email
        echo "Sending email to $to: $message\n";
    }
}

class SmsNotification
{
    public function send($to, $message)
    {
        // Logic to send SMS
        echo "Sending SMS to $to: $message\n";
    }
}


/**
 * ! Open/Closed Principle - Classes should be open for extension but closed for modification
 * ! - New notification types (e.g., PushNotification) can be added without modifying existing classes.
 */
interface Notification
{
    public function send($to, $message);
}

class EmailNotificationV1 implements Notification
{
    public function send($to, $message)
    {
        echo "Sending email to $to: $message\n";
    }
}

class SmsNotificationV1 implements Notification
{
    public function send($to, $message)
    {
        echo "Sending SMS to $to: $message\n";
    }
}

/**
 * ! Liskov Substitution Principle - Subclasses should be substitutable for their base classes.
 * ! - NotificationSender can handle any class implementing Notification.
 */
class NotificationSender
{
    private $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function sendNotification($to, $message)
    {
        $this->notification->send($to, $message);
    }
}

// Use EmailNotification
$emailSender = new NotificationSender(new EmailNotificationV1());
$emailSender->sendNotification('user@example.com', 'Hello via Email!');

// Use SmsNotification
$smsSender = new NotificationSender(new SmsNotificationV1());
$smsSender->sendNotification('1234567890', 'Hello via SMS!');


/**
 * ! Interface Segregation Principle - Clients should not be forced to depend on methods they do not use.
 * ! - Clients only depend on what they need (EmailService, SmsService).
 */
interface EmailService
{
    public function sendEmail($to, $message);
}

interface SmsService
{
    public function sendSms($to, $message);
}

class EmailNotificationV2 implements EmailService
{
    public function sendEmail($to, $message)
    {
        echo "Sending email to $to: $message\n";
    }
}

class SmsNotificationV2 implements SmsService
{
    public function sendSms($to, $message)
    {
        echo "Sending SMS to $to: $message\n";
    }
}

/**
 * ! Dependency Inversion Principle - High-level modules should not depend on low-level modules. Both should depend on abstractions.
 * ! - High-level logic depends on abstractions, not concrete implementations.
 */
interface NotificationV1
{
    public function send($to, $message);
}

class EmailNotificationV3 implements NotificationV1
{
    public function send($to, $message)
    {
        echo "Sending email to $to: $message\n";
    }
}

class SmsNotificationV3 implements NotificationV1
{
    public function send($to, $message)
    {
        echo "Sending SMS to $to: $message\n";
    }
}

class NotificationService
{
    private $notification;

    public function __construct(NotificationV1 $notification)
    {
        $this->notification = $notification;
    }

    public function notify($to, $message)
    {
        $this->notification->send($to, $message);
    }
}

// Usage
$service = new NotificationService(new EmailNotificationv3());
$service->notify('user@example.com', 'Dependency Inversion is awesome!');
