<section id="edit-units">
		<form action="update.php" method="post">
  <label for="blood-group">Blood Group:</label>
  <select id="blood-group" name="blood-group">
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

  <label for="units">Units:</label>
  <input type="number" id="units" name="units">

  <input type="submit" value="Update">
</form>
	</section>