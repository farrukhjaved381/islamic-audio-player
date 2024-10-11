<?php
// Include required files
include 'config.php';
include 'functions.php';
require 'vendor/autoload.php';
 // Make sure you have PHPMailer installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database table name
    $table = "contact";

    // Sanitize and validate input data
    $data = [
        'name' => htmlspecialchars(trim($_POST['name'])),
        'email' => filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL),
        'subject' => htmlspecialchars(trim($_POST['subject'])),
        'message' => htmlspecialchars(trim($_POST['message'])),
    ];

    // Check if email is valid
    if (!$data['email']) {
        $response['message'] = 'Invalid email address.';
    } else {
        // Insert data and check result
        if (!insertData($conn, $table, $data)) {
            $response['message'] = 'There was an error sending your message.';
        } else {
            // Send email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mfarrukhjaved381@gmail.com'; // Replace with your Gmail address
                $mail->Password = 'iijl hmrl dhjh kbzk'; // Replace with your Gmail app password
                $mail->SMTPSecure = 'tls'; // Use 'tls' for port 587
                $mail->Port = 587; // TCP port to connect to

                // Recipients setting
                $mail->setFrom('mfarrukhjaved381@gmail.com', 'Farrukh Work'); // Replace with your email address and name
                $mail->addAddress('mfarrukhjaved381@gmail.com', 'Farrukh'); // Replace with your email address
                $mail->addReplyTo($data['email'], $data['name']); // Use the client's email for replies

                // Content of email
                $mail->isHTML(true);
                $mail->Subject = 'Hi Farrukh! ' . $data['name'] . ' Wants to contact you through your portfolio';
                $mail->Body    = '<p><strong>Name:</strong> ' . $data['name'] . '</p>'
                                . '<p><strong>Email:</strong> ' . $data['email'] . '</p>'
                                . '<p><strong>Subject:</strong> ' . $data['subject'] . '</p>'
                                . '<p><strong>Message:</strong><br>' . nl2br($data['message']) . '</p>';
                $mail->AltBody = 'Name: ' . $data['name'] . "\n"
                                . 'Email: ' . $data['email'] . "\n"
                                . 'Subject: ' . $data['subject'] . "\n"
                                . 'Message: ' . $data['message'];

                $mail->send();
                $response['success'] = true;
                $response['message'] = 'Your message has been sent successfully!';
            } catch (Exception $e) {
                $response['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }
}

echo json_encode($response);
exit();
