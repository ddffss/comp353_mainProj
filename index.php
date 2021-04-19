<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php

if(isset($_POST['submit'])) {
	$username = $_POST[''];
	$password = $_POST[''];
}


?>

    <h1 style="text-align:center; margin-top:50px;">A Simple Database Application System for the <br>COVID-19 Public Health Care</h1>
    <h6  style="text-align:center;">Helping the public health administration keep track of, monitor, and control the spread of COVID-19.</h6>


  	<div class="row" style="margin-top:150px;">
		<div class="col-4"></div>
		<div class="col-4">
			<!-- login -->
			<div class="login">
				<form action="profile.php" method="post">
					<div class="form-group">
						<input name="username" type="text" class="login-form-control" placeholder="Enter Medicare Card Number">
					</div>

					<div class="input-group">
                        <input name="password" type="password" class="login-form-control" placeholder="Enter Birthday YYYY-MM-DD">
					</div>
					<span class="input-group-btn" style="text-align:end;" >
							<button class="btn btn-primary" name="login" type="submit">Log In </button>
					</span>    
				</form>
			</div></div>
		<div class="col-4"></div>
	</div>

<?php include "includes/footer.php";?>
 

<?php include "includes/footer.php";?>