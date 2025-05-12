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

       echo "<h3>Form Data Submitted</h3>";
       echo "<table>";
       echo "<tr><th>Section</th><th>Values</th></tr>";
       echo "<tr><td>Full Name</td><td>" . $_POST['fullname']."</td></tr>";
       echo "<tr><td>Username</td><td>".$_POST['name'] . "</td></tr>";
       echo "<tr><td>Email</td><td>".$_POST['email'] . "</td></tr>";
       echo "<tr><td>Date of Birth</td><td>".$_POST['dob'] . "</td></tr>";
       echo "<tr><td>Country</td><td>".$_POST['country'] . "</td></tr>";
       echo "<tr><td>Gender</td><td>".$_POST['gender'] . "</td></tr>";
       echo "<tr><td>Color</td><td>".$_POST['color'] . "</td></tr>";

    echo "</table>";
    ?>
        <div class="btn-container">
            <button class="btn" >Back</button>
            <button class="btn">Submit</button>
        </div>
    <?php
      }
      else {
        echo "No data received.";
    }
       ?>
</div>
</body>
</html>
