<?php
// Connect to the database (replace 'hostname', 'username', 'password', and 'database_name' with your own values)
$conn = mysqli_connect('localhost', 'root', '', 'demo');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Get form data
$name = $_POST['name'];
$blood_group = $_POST['blood-group'];
$age = $_POST['age'];
$location = $_POST['location'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];

// Prepare SQL statement
$sql = "INSERT INTO donors (name, blood_group, age, location, gender, contact) VALUES ('$name', '$blood_group', '$age', '$location', '$gender', '$contact')";

// Execute SQL statement
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("New record created successfully"); window.history.back();location.reload();</script>'
    ;
}
 else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
