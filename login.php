<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['loginUsername'] ?? '';
    $password = $_POST['loginPassword'] ?? '';

    $conn = mysqli_connect("localhost", "root", "", "info");
    if (!$conn) {
        die("Connection failed.");
    }
      if (empty($username) || empty($password)) {
            echo "Username and password cannot be empty.";
            exit();
      }
    $username = strtolower(trim($username));
    $query = "SELECT Id, Username, Password FROM user WHERE LOWER(Username) = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['Password']) {
            $_SESSION['user_id'] = $row['Id'];
            $_SESSION['user_name'] = $username;
            $_SESSION['logged_in'] = true;

            header("Location: request.php");
            exit();
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "Email not found.";
    }

    mysqli_close($conn);
}
?>