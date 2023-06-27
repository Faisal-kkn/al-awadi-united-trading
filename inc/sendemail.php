<?php

// Define some constants
define("RECIPIENT_NAME", "barq ");
define("RECIPIENT_EMAIL", "fcr04385@gmail.com");

// Read the form values
$success = false;
$name = isset($_POST['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name']) : "";
$senderEmail = isset($_POST['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email']) : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$subject = isset($_POST['subject']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject']) : "";
$message = isset($_POST['message']) ?  $_POST['message'] : "";

$mail_subject = 'A contact request send by ' . $name;


$body = "DFDF ";






// If all values exist, send the email
if ($name && $senderEmail && $message) :
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";

    $headers = "Content-Type: text/html; charset=iso-8859-1\r\n";
    $headers  .= "From: testsite <mail@testsite.com>\r\n";
    $headers .= "Cc: testsite <mail@testsite.com>\n";
    $headers .= "X-Sender: testsite <mail@testsite.com>\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: mail@testsite.com\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";

    $success = mail($recipient, $mail_subject, $body, $headers);
    if ($success) :
        $res['stat'] = 'ok';
    else :
        $res['stat'] = 'no';
        $res['err'] = error_get_last();
    endif;
    echo json_encode($res);
endif;
