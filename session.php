<?php
session_start();

$message = ""; // Placeholder for feedback message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted and cities are selected
    if (!isset($_POST['cities'])) {
        $message = "<p style='color:red;'>No cities selected. Please select 10 cities.</p>";
    } else {
        $selectedCities = $_POST['cities'];
        $count = count($selectedCities);

        // Validate the number of selected cities
        if ($count < 10) {
            $message = "<p style='color:red;'>You selected $count cities. Please select exactly 10 cities.</p>";
        } elseif ($count > 10) {
            $message = "<p style='color:red;'>You selected $count cities. You can only select up to 10 cities.</p>";
        } else {
            // Clear old city session data
            for ($i = 1; $i <= 10; $i++) {
                unset($_SESSION["city_$i"]);
            }

            // Save 10 selected cities into individual session variables
            foreach ($selectedCities as $index => $city) {
                $_SESSION["city_" . ($index + 1)] = htmlspecialchars($city);
            }

            $message = "<p style='color:green;'>10 cities saved to session successfully!</p>";
        }
    }
}
?>
