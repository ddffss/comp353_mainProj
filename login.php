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
						<input name="password" type="password" class="login-form-control" placeholder="Enter Birthday YYYY-MM-DD">
					</div>
					<span class="input-group-btn">
							<button class="btn btn-primary" name="login" type="submit">Log In </button>
					</span>    
				</form>
			</div></div>
		<div class="col-4"></div>
	</div>

<?php include "includes/footer.php";?>
 



<?php include "includes/db.php";?>

<?php session_start();?>
<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>






<?php

    $query ="SELECT * FROM Person";

    // function below will pull out the result
    $select_user_query = (mysqli_query($connection, $query));
    if(!$select_user_query) 
    {
        die("QUERY FAILED". mysqli_error($connection));
    }


    while($row = mysqli_fetch_array($select_user_query)) {

       $db_firstName = $row['FirstName'];
       $db_lastName = $row['LastName'];
       $db_medCardNum = $row['Medicare'];
       $db_dob = $row['DOB'];
       $db_phone = $row['Phone'];
       $db_address = $row['Address'];
       $db_city = $row['City'];
       $db_province = $row['Province'];
       $db_postalCode = $row['PostalCode'];
       $db_citizenship = $row['Citizenship'];
       $db_email = $row['Email'];
       $db_mother = $row['Parent1'];
       $db_father = $row['Parent2'];
     } 
?> 

<h1 style="text-align:center; margin-top:50px;">A Simple Database Application System for the <br>COVID-19 Public Health Care</h1>
<h5  style="text-align:center;">Helping the public health administration keep track of, monitor, and control the spread of COVID-19.</h5>




<?php include "includes/footer.php";?>