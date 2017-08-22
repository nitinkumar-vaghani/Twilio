<?php

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
//require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

require_once __DIR__ . '/twilio/Services/Twilio.php';
// Use the REST API Client to make requests to the Twilio REST API
//use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACaf5e99ebdbcc6956a3e7b3b2c7639c6d'; //test
$token = '61bf7c66bb5a4712d98d245160b26de3'; //test
//$sid = 'ACe174eb8faa2c59957c293889fa8df50a'; live
//$token = '61921858d2341150c0b72d067db5a5aa'; live

define('TWILIO_ACC_SID', 'ACe174eb8faa2c59957c293889fa8df50a');
define('TWILIO_AUTH_TOKEN', '61921858d2341150c0b72d067db5a5aa');
define('TWILIO_REG_NUMBER', '+18312192114');

try {
//    $client = new Client($sid, $token);
// Use the client to do fun stuff like send text messages!
//    $client->messages->create(
//            // the number you'd like to send the message to
//            '+919624291108', array(
//        // A Twilio phone number you purchased at twilio.com/console //+18312192114
//
//        'from' => '+18312192114',
//        // the body of the text message you'd like to send
//        'body' => "Hey Jenny! Good luck on the bar exam!"
//            )
//    );
//
    $number = '+919924554184';
    $message = "Hey Gaurav, This is twilio message";

    $AccountSid = TWILIO_ACC_SID;
    $AuthToken = TWILIO_AUTH_TOKEN;
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $sms = $client->account->messages->sendMessage(
            TWILIO_REG_NUMBER, str_replace("-", "", $number), $message
    );

    @file_put_contents("twilio_log.txt", "\n\n sms" . json_encode($sms) . "\n\n", FILE_APPEND | LOCK_EX);


    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * 1. Save it as sendnotifications.php and at the command line, run 
     *         php sendnotifications.php
     *
     * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *    in a web browser.
     *
     * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *    directory to the folder containing this file, and load 
     *    localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
    // following the instructions to install it with Composer.
    // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
    // Step 3: instantiate a new Twilio Rest Client

    /*
      $client = new Client(TWILIO_ACC_SID, TWILIO_AUTH_TOKEN);

      // Step 4: make an array of people we know, to send them a message.
      // Feel free to change/add your own phone number and name here.
      $people = array(
      "+919924554184" => "Gaurav Radadiya"
      );

      // Step 5: Loop over all our friends. $number is a phone number above, and
      // $name is the name next to it
      foreach ($people as $number => $name) {

      $sms = $client->account->messages->create(
      // the number we are sending to - Any phone number
      $number, array(
      // Step 6: Change the 'From' number below to be a valid Twilio number
      // that you've purchased
      'from' => TWILIO_REG_NUMBER,
      // the sms body
      'body' => "Hey " . $name . ", This is twilio message"
      )
      );

      // Display a confirmation message on the screen
      echo "Sent message to " . $name;

      @file_put_contents("twilio_log.txt", "\n\n sms" . json_encode($sms) . "\n\n", FILE_APPEND | LOCK_EX);
      }

     */
} catch (Exception $e) {
    @file_put_contents("twilio_log.txt", "\n\n " . $number . " --->" . $e->getMessage() . "\n\n", FILE_APPEND | LOCK_EX);
}