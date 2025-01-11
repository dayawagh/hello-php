<?php
// composer require phpmailer/phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                             // Gmail SMTP server
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = 'your_email@gmail.com';                   // Your Gmail address
    $mail->Password = 'your_app_password';                      // Your Gmail app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port = 587;                                          // TCP port for TLS

    // Recipients
    $mail->setFrom('your_email@gmail.com', 'Your Name');        // Sender email
    $mail->addAddress('recipient_email@example.com', 'Recipient Name'); // Add a recipient

    // Email content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Test Email from Gmail SMTP';
    $mail->Body    = '<h1>This is a test email</h1><p>Sent using Gmail SMTP and PHPMailer.</p>';
    $mail->AltBody = 'This is a test email sent using Gmail SMTP and PHPMailer.';

    // Send email
    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
