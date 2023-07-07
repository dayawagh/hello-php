<?php
require_once "vendor/autoload.php"; // This line is required if you are using composer

// Import the necessary classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer object
$mail = new PHPMailer(true); // Passing 'true' enables exceptions

try {
    // Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output. Set to 0 to disable.
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.example.com'; // Specify SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'your_email@example.com'; // SMTP username
    $mail->Password = 'smtp_password'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to.

    // Recipients
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add a recipient. Multiple recipients can be added with addAddress().

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Subject of the Email';
    $mail->Body    = 'HTML body of the email goes here';
    $mail->AltBody = 'Plain text version of the email goes here';

    $mail->send();
    echo 'Email has been sent!';
} catch (Exception $e) {
    echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
}
?>
