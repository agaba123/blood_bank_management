<?php
// Connect to the database
$db = new mysqli("localhost", "root", "", "demo");

// Retrieve the data from the form
$blood_group = $_POST["blood-group"];
$units = $_POST["units"];

// Update the table
$query = "UPDATE blood_bank SET available_units = available_units + $units WHERE blood_group = '$blood_group'";
$result = $db->query($query);

// Trigger the Last Updated field
$query = "UPDATE blood_bank SET last_updated = NOW() WHERE blood_group = '$blood_group'";
$result = $db->query($query);
echo "sucess baby!!!!";
// Redirect the user back to the page with the table
header("Location: main.php");
?>
