<?php
// Apply background color from cookie if set
$bgColor = isset($_COOKIE['user_bgcolor']) ? $_COOKIE['user_bgcolor'] : '#ffffff';
echo "<style>body { background-color: $bgColor; }</style>";
?>

<?php
session_start();

// ✅ If form submitted directly to this page
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cities'])) {
    $_SESSION['selected_cities'] = $_POST['cities'];
}

// ✅ Check session for selected cities
if (!isset($_SESSION['selected_cities']) || !is_array($_SESSION['selected_cities']) || count($_SESSION['selected_cities']) === 0) {
    echo "No cities selected.";
    exit;
}

// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selected_cities = $_SESSION['selected_cities'];
$placeholders = implode(',', array_fill(0, count($selected_cities), '?'));



// Fetch AQI data
$sql = "SELECT city, aqi FROM AQI WHERE city IN ($placeholders)";
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
