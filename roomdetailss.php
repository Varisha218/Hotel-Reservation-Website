<?php
// Include the database connection file
include('dbcon.php');

// Check if the connection is established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $roomType = $_POST['roomType'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $noOfRooms = $_POST['noOfRooms'];

    // Update record in the database
    $qry = "UPDATE `room_bookings` SET `room_type`='$roomType', `check_in_date`='$checkin', `check_out_date`='$checkout', `no_of_rooms`='$noOfRooms' WHERE `id`='$id'";
    $result = mysqli_query($conn, $qry);
z
    // Check if the query was successful
    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch room booking details based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = "SELECT * FROM `room_bookings` WHERE `id`='$id'";
    $result = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($result);

    // Check if record exists
    if (!$row) {
        die("Record not found");
    }

    // Assign values to variables
    $roomType = $row['room_type'];
    $checkin = $row['check_in_date'];
    $checkout = $row['check_out_date'];
    $noOfRooms = $row['no_of_rooms'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room Booking</title>
</head>
<body>
    <h2>Update Room Booking</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Include the record ID as a hidden field -->
        <label for="roomType">Room Type:</label>
        <input type="text" name="roomType" value="<?php echo $roomType; ?>"><br>
        <label for="checkin">Check In Date:</label>
        <input type="text" name="checkin" value="<?php echo $checkin; ?>"><br>
        <label for="checkout">Check Out Date:</label>
        <input type="text" name="checkout" value="<?php echo $checkout; ?>"><br>
        <label for="noOfRooms">No of Rooms:</label>
        <input type="text" name="noOfRooms" value="<?php echo $noOfRooms; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
