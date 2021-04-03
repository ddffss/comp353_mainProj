<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<div class="container">

<?php

if(isset($_POST['submit'])) {
	$username = $_POST[''];
	$password = $_POST[''];
}


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Hello COMP AAAA</h1>

	<?php
		$result = $connection->query("SELECT * FROM Person");
		while($row = $result->fetch_assoc()) {
			echo $row['FirstName']." ".$row['LastName']."<br>";
		}
	?> -->


  	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<!-- login -->
			<div class="login">
				<h4 class="login-title">COVID-19 Public Health Care System</h4>
				<form action="profile.php" method="post">
					<div class="form-group">
						<input name="username" type="text" class="login-form-control" placeholder="Enter Medicare Card Number">
					</div>

					<div class="input-group">
						<input name="password" type="password" class="login-form-control" placeholder="Enter Date of Birth as YYYY-MM-DD">
					</div>
					<span class="input-group-btn">
							<button class="btn btn-primary" name="login" type="submit">Log In </button>
					</span>    
				</form>
			</div></div>
		<div class="col-4"></div>
	</div>
<!-- 
</body>
</html> -->

<?php include "includes/footer.php";?>
