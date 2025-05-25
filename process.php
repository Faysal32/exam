<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitData'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "info";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn->connect_error) {
        // Collect POST data
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['Upass'];
        #$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $cookieName = "bgcol_" . md5(strtolower($username));
                setcookie($cookieName, $color, [
                    'expires' => time() + (86400 * 30),
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']),
                    'httponly' => true,
                    'samesite' => 'Strict'
                ]);

        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO user (Username, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "<script>
            localStorage.setItem('formSubmitted', '1');
        </script>";
    } else {
        echo '<script>alert("Database connection failed");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Summary</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles2.css">
</head>
<body>
<div class="container">
    <h2>Submitted Registration Details</h2>
    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       echo "<table>";
       echo "<tr><th>Section</th><th>Values</th></tr>";
       echo "<tr><td>Full Name</td><td>" . $_POST['fullname']."</td></tr>";
       echo "<tr><td>Username</td><td>".$_POST['name'] . "</td></tr>";
       echo "<tr><td>Email</td><td>".$_POST['email'] . "</td></tr>";
       echo "<tr><td>Password</td><td>".$_POST['Upass'] . "</td></tr>";
       echo "<tr><td>Date of Birth</td><td>".$_POST['dob'] . "</td></tr>";
       echo "<tr><td>Country</td><td>".$_POST['country'] . "</td></tr>";
       echo "<tr><td>Gender</td><td>".$_POST['gender'] . "</td></tr>";
       echo "<tr><td>Color</td><td>".$_POST['color'] . "</td></tr>";
       echo "<tr><td>Thought</td><td>".$_POST['msdg'] . "</td></tr>";

    echo "</table>";
    ?>
        <div class="btn-container">
            <button class="btn" id="backbtn">Cancel</button>
            <form method="POST" action="">
                <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                <input type="hidden" name="Upass" value="<?php echo $_POST['Upass']; ?>">
                <input type="hidden" name="fullname" value="<?php echo $_POST['fullname']; ?>">
                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                <input type="hidden" name="dob" value="<?php echo $_POST['dob']; ?>">
                <input type="hidden" name="country" value="<?php echo $_POST['country']; ?>">
                <input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">
                <input type="hidden" name="color" value="<?php echo $_POST['color']; ?>">
                <input type="hidden" name="msdg" value="<?php echo $_POST['msdg']; ?>">

                <button type="submit" name="submitData" class="btn">Submit</button>

            </form>
        </div>
    <?php
      }
      else {
        echo "No data received.";
    }
       ?>
</div>
<script src="script01.js"></script>
</body>
</html>
