<?php

/**
 * ? FACTORY METHOD
 */

interface Notification
{
    public function send(string $message): void;
}

/**
 * ! Concrete Products
 */
class EmailNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Email sent: " . $message . PHP_EOL;
    }
}

class SMSNotification implements Notification
{
    public function send(string $message): void
    {
        echo "SMS sent: " . $message . PHP_EOL;
    }
}

/**
 * ! Creator Class
 */
abstract class NotificationFactory
{
    abstract public function createNotification(): Notification;

    public function sendNotification(string $message): void
    {
        $notification = $this->createNotification();
        $notification->send($message);
    }
}

/**
 * ! Concrete Creators
 */
class EmailNotificationFactory extends NotificationFactory
{
    public function createNotification(): Notification
    {
        return new EmailNotification();
    }
}
//
class SMSNotificationFactory extends NotificationFactory
{
    public function createNotification(): Notification
    {
        return new SMSNotification();
    }
}

/**
 * ! Client Code
 */
function sendNotifications(NotificationFactory $factory, string $message): void
{
    $factory->sendNotification($message);
}

// Sending Email Notification
$emailFactory = new EmailNotificationFactory();
sendNotifications($emailFactory, "Hello via Email!");

// Sending SMS Notification
$smsFactory = new SMSNotificationFactory();
sendNotifications($smsFactory, "Hello via SMS!");