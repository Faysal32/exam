<?php
// Apply background color from cookie
$bgColor = isset($_COOKIE['user_bgcolor']) ? $_COOKIE['user_bgcolor'] : '#ffffff';
echo "<style>body { background-color: $bgColor; }</style>";
?>
<?php
// Check if the logout button was pressed
if (isset($_POST['logout'])) {
    // Optional: destroy session if needed
    // session_start();
    // session_destroy();

    header("Location: Layout02.html");
    exit();
}
?>


<?php
session_start();

//session for cities
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cities'])) {
    $_SESSION['selected_cities'] = $_POST['cities'];
}

// Check session for selected cities
if (!isset($_SESSION['selected_cities']) || !is_array($_SESSION['selected_cities']) || count($_SESSION['selected_cities']) === 0) {
    echo "No cities selected.";
    exit;
}

// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selected_cities = $_SESSION['selected_cities'];
$placeholders = implode(',', array_fill(0, count($selected_cities), '?'));



// Fetch AQI data
$sql = "SELECT city, aqi FROM info WHERE city IN ($placeholders)";
$stmt = $conn->prepare($sql);


$types = str_repeat('s', count($selected_cities));
$stmt->bind_param($types, ...$selected_cities);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selected Cities AQI</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<div class="logout-btn">
    <form method="post">
        <button type="submit" name="logout">
            <span class="logout-icon">&#x1F6AA;</span> <!-- Door icon -->
            Logout</button>
    </form>
</div>
<div class="aqi-results">
    <h2>Air Quality Index for Selected Cities</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>City</th>
                <th>AQI</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['city']); ?></td>
                    <td><?php echo htmlspecialchars($row['aqi']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No AQI data found for the selected cities.</p>
    <?php endif; ?>
</div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
