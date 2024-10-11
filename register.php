<?php
require 'vendor/autoload.php';
include 'config.php'; // Database connection
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    if ($email) {
        // Generate a verification token
        $token = bin2hex(random_bytes(50));

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, token) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $token);

        if ($stmt->execute()) {
            // Send verification email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mfarrukhjaved381@gmail.com'; // Your Gmail address
                $mail->Password = 'iijl hmrl dhjh kbzk'; // Your Gmail password or app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('your-email@gmail.com', 'Your Name');
                $mail->addAddress($email, $username);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification';
                $mail->Body = "Please click the link below to verify your email:<br>
                               <a href='http://localhost/myweb/Projects/Spotify_clone/verify.php?token=$token'>Verify Email</a>";

                $mail->send();

                echo 'A verification email has been sent to your email address. Please verify your email to log in.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo 'Error: Could not register user.';
        }

        $stmt->close();
    } else {
        echo 'Invalid email address.';
    }
}
