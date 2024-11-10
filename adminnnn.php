<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the check-in and check-out dates from the form
    $checkin_date = $_GET["checkin"];
    $checkout_date = $_GET["checkout"];

    // Your logic to check availability and display results
    // This could involve querying a database or any other method to check availability

    // For now, let's just echo the submitted dates
    echo "Check-in Date: " . $checkin_date . "<br>";
    echo "Check-out Date: " . $checkout_date . "<br>";
}
?>
