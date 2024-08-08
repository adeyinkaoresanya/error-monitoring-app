<?php
// send_twilio_alert.php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


use Twilio\Rest\Client;

// $twilio_sid = $_ENV['TWILIO_ACCOUNT_SID'];
// $twilio_token = $_ENV['TWILIO_AUTH_TOKEN'];
// $twilio_number = $_ENV['TWILIO_PHONE_NUMBER'];
// $alert_number = $_ENV['ALERT_PHONE_NUMBER'];

$twilio_sid = getenv('TWILIO_ACCOUNT_SID');
$twilio_token = getenv('TWILIO_AUTH_TOKEN');
$twilio_number = getenv('TWILIO_PHONE_NUMBER');
$alert_number = getenv('ALERT_PHONE_NUMBER');


$client = new Client($twilio_sid, $twilio_token);
$error_message = "Critical error detected in your application. Please check the logs immediately.";

$twiml = "<Response><Say>$error_message</Say></Response>";

$client->calls->create(
    $alert_number,
    $twilio_number,
    ['twiml' => $twiml]
);
