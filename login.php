<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $conn = new mysqli("localhost", "root", "", "info");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = strtolower(trim($username));

    $stmt = $conn->prepare("SELECT Id, Username, Password FROM user WHERE LOWER(Username) = '$username'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['user_id'] = $row['Id'];
            $_SESSION['user_name'] = $row['Username'];
            $_SESSION['logged_in'] = true;

            header("Location: request.php");
            exit();
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "Username not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
