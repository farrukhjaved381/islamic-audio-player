<?php
session_start();
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']) ? 1 : 0;

    if ($email && $password) {
        // Check if the user exists
        $stmt = $conn->prepare("SELECT id, password,username, is_verified FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

       

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $stmt->close();

          

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Check if email is verified
                if ($user['is_verified']) {
                    // Start a session and set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $user['username'];
                    

                    // Redirect to the home page or dashboard
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Please verify your email address first.";
                }
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with this email.";
        }
    } else {
        echo "Invalid input.";
    }

    $conn->close();
}
$q="Select username from users";
$records=$conn->query($q);
while($row=$records->fetch_assoc()){
$username=$row["username"];

}
