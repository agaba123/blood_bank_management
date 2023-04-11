<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Blood Donors and Blood Bank Tables</title>

	<nav style="background-color: #F2583E ; text-align: center;">
        <ul>
          <li><a href="#donors-table">Our Donors</a></li>
          <li><a href="#blood-bank">Blood Bank</a></li>
          <li><a href="#add-donor">Add Donor</a></li>
        
          
        </ul>
      </nav>
      
      <p>  </p>

      <p>  </p>
</head>
<body>
	<section id="donors-table">
	<div class="section">
		<div class="section-title">Blood Donors Table</div>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Blood Group</th>
					<th>Age</th>
					<th>location</th>
					<th>Gender</th>
					<th>Contact</th>
				</tr>
			</thead>
			<tbody>
		<?php
		// Connect to the database 
		$conn = mysqli_connect('localhost', 'root', '', 'demo');

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Prepare SQL statement
		$sql = "SELECT * FROM donors";

		// Execute SQL statement and get results
		$result = mysqli_query($conn, $sql);

		// Loop through results and output as table rows
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['blood_group'] . "</td>";
			echo "<td>" . $row['age'] . "</td>";
			echo "<td>" . $row['location'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['contact'] . "</td>";
			echo "</tr>";
		}

		// Close database connection
		mysqli_close($conn);
		?>

	</tbody>
</table>
		</table>
	</div>
	</section>

	<section id="blood-bank">
	<div class="section">
		<div class="section-title">Blood Bank Table</div>
		<table>
			<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute a query to retrieve the blood bank data
$sql = "SELECT * FROM blood_bank";
$result = mysqli_query($conn, $sql);

// Generate an HTML table from the query results
echo "<table>
        <thead>
            <tr>
                <th>Blood Group</th>
                <th>Available Units</th>
                <th>Last Updated</th>
                
            </tr>
        </thead>
        <tbody>";
        
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["blood_group"] . "</td>
                <td>" . $row["available_units"] . "</td>
                <td>" . $row["last_updated"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data available</td></tr>";
}

echo "</tbody></table>";

mysqli_close($conn);
?>
<a href="bank.php" class="centered-button">Update Blood Bank</a>


	</div>
	</section>

	<section id="add-donor">
		
	
	<h2>Add a New Donor</h2>
	<form action="donor.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>

		<label for="blood-group">Blood Group:</label>
		<select id="blood-group" name="blood-group" required>
			<option value=""></option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>
			<option value="AB+">AB+</option>
			<option value="AB-">AB-</option>
		</select>

		<label for="age">Age:</label>
		<input type="number" id="age" name="age" required>

		<label for="location">Location:</label>
		<input type="text" id="location" name="location" required>

		<label for="gender">Gender:</label>
		<select id="gender" name="gender" required>
			<option value=""></option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			
		</select>

		<label for="contact">Contact:</label>
		<input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required>

		<button type="submit" >Add Donor</button>
	

	</section>
	
	</body>
</html>