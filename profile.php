<?php include "includes/db.php";?>

<?php session_start();?>
<?php include "includes/header.php";?>
<?php include "includes/prof-nav.php";?>



<?php
if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];



    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query ="SELECT * FROM Person WHERE Medicare = '$username' && FirstName = '$password'" ;

    // function below will pull out the result
    $select_user_query = (mysqli_query($connection, $query));
    if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }


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

    if ($username !== $db_medCardNum && $password !==  $db_firstName) {
        header("Location: ../login.php");
    }

?>
<div class="container">
<div class="row profile">
    <div class="col-2">
        <span class="dot"></span>
    </div>
    <div class="col-9">
        <p class="profile"><?php echo $db_firstName.' '.$db_lastName ?></p>
        <p class="profile"><?php echo $db_medCardNum ?></p>
        <p class="profile"><?php echo $db_phone ?></p>
    </div>
    <div class="col-1"></div>

<br>
<?php include "includes/prof-sub-nav.php";?>
<hr>
</div>
<br>


    <form action="/action_page.php">
        <div class="form-group details">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $db_firstName.' '.$db_lastName ?>">
        </div>

        <div class="form-group details">
            <label for="medicare">Medicare Card No.:</label>
            <input type="text" id="medicare" name="medicare" value="<?php echo $db_medCardNum ?>">
        </div>

        <div class="form-group details">
            <label for="dob">Birthday:</label>
            <input type="text" id="dob" name="dob" value="<?php echo $db_dob ?>">
        </div>

        <div class="form-group details">
            <label for="phone">Phone No.:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $db_phone ?>">
        </div>

        <div class="form-group details">
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" value="<?php echo $db_dob ?>">
        </div>

        <div class="form-group details">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $db_address.' '. $db_city.' '.$db_province.' '.$db_postalCode ?>">
        </div>

        <div class="form-group details">
            <label for="mother">Mother:</label>
            <input type="text" id="mother" name="mother" value="<?php echo $db_mother ?>">
        </div>    

        <div class="form-group details">
            <label for="father">Father:</label>
            <input type="text" id="father" name="father" value="<?php echo $db_father ?>">
        </div>

    </form> 
</div>

<?php include "includes/footer.php";?>