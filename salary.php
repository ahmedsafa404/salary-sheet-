<!DOCTYPE html>
<html>
<head>
	<title>Employee:Information</title>
</head>
<body>
<div style="height: 600px;width: 450px;float: left;">
	<center>
		<h2>Insert Employee Info</h2>
		<p>
			<form method="post">
				<label>Employee Name:</label>
				<br>
				<input type="text" name="name"><br>
				<label>Salary:</label>
				<br>
				<input type="text" name="salary"><br><br>
				<input type="submit" name="save" value="Save">
			</form>
		</p>
		<?php

			error_reporting(0);

			if(isset($_POST['save'])){
				$db = mysqli_connect('localhost','root','','employee');

				$name  = $_POST['name'];

				$salary= $_POST['salary'];


				if($db == TRUE){

					$sql = "INSERT INTO info (name,salary) VALUES('$name','$salary')";

					$query = mysqli_query($db,$sql);

					if($query == TRUE){
						echo "Data Stored Successfully";
					}else{
						echo "Data Insert Failed";
					}

				}
			}


		?>

		
	</center>
</div>
<div style="height: 600px;width: 450px;float: left;">
<center>
	<h2>Search</h2>
	<p>
		<form method="post">
		<label>Employee Name :</label>
		<br>
		<input type="text" name="employee">
		<br><br>
		<input type="submit" name="search" value="Search">
			
		</form>
	</p>
	<?php

		error_reporting(0);

		if(isset($_POST['search'])){

			$db = mysqli_connect('localhost','root','','employee');

			$employee = $_POST['employee'];

			$sql = "SELECT * FROM info WHERE name='$employee'";

			$search_query = mysqli_query($db,$sql);

			$row = mysqli_fetch_array($search_query);

			$name = $row['name'];

			$salary = $row['salary'];

			echo "<table border='1'>
					<tr>
					<th>Position</th>
					<th>Salary</th>
					</tr>
					<tr>
					<td>$name</td>
					<td>$salary</td>
					</tr>
				 </table>
				 ";

			
			
		}




	?>
</center>
</div>
<div style="height: 600px;width: 400px;float: left;">
<center>
	<h2>Total Paid Salary</h2>
	<p>
		<form method="post">
		
		<input type="submit" name="total" value="Click to View Total Salary">
		

			
		</form>
	</p>
	<?php
		error_reporting(0);

		if(isset($_POST['total'])){
			$db = mysqli_connect('localhost','root','','employee');

			$result = mysqli_query($db,"SELECT SUM(salary) AS Total FROM info");

			$row = mysqli_fetch_assoc($result);

			$sum = $row['Total'];

			echo "Total Payable Salary : ".$sum;


		}


	?>
</center>
</div>
</body>
</html>