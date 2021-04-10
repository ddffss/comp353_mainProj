<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<div class="container">

<?php

if(isset($_POST['submit'])) {
	$username = $_POST[''];
	$password = $_POST[''];
}


?>

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
						<input name="password" type="password" class="login-form-control" placeholder="Enter First Name">
					</div>
					<span class="input-group-btn">
							<button class="btn btn-primary" name="login" type="submit">Log In </button>
					</span>    
				</form>
			</div></div>
		<div class="col-4"></div>
	</div>

<?php include "includes/footer.php";?>
