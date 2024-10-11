<?php
include 'config.php'; // Database connection

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE token=? LIMIT 1");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stmt->close();

        $stmt = $conn->prepare("UPDATE users SET is_verified=1, token=NULL WHERE id=?");
        $stmt->bind_param("i", $user['id']);

        if ($stmt->execute()) {
            header("Location: index.php");
                    exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid token!";
    }

    $stmt->close();
} else {
    echo "No token provided!";
}

$conn->close();
