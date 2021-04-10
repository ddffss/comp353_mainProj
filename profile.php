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

    else {
        
        $_SESSION['firstName'] = $db_firstName;
        $_SESSION['lastName'] = $db_lastName;
        $_SESSION['medCardNum'] = $db_medCardNum;
        $_SESSION['dob'] = $db_dob;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['address'] = $db_address;
        $_SESSION['city'] = $db_city;
        $_SESSION['province'] = $db_province;
        $_SESSION['postalCode'] = $db_postalCode;
        $_SESSION['citizenship'] = $db_citizenship;
        $_SESSION['email'] = $db_email;
        $_SESSION['mother'] = $db_mother;
        $_SESSION['father'] = $db_father;
    }

?>
<div class="container">
<div class="row profile">
    <div class="col-2">
        <span class="dot"></span>
    </div>
    <div class="col-9">
        <p class="profile"><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></p>
        <p class="profile"><?php echo $_SESSION['medCardNum'] ?></p>
        <p class="profile"><?php echo $_SESSION['phone'] ?></p>
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
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'] ?>">
        </div>

        <div class="form-group details">
            <label for="medicare">Medicare Card No.:</label>
            <input type="text" id="medicare" name="medicare" value="<?php echo $_SESSION['medCardNum'] ?>">
        </div>

        <div class="form-group details">
            <label for="dob">Birthday:</label>
            <input type="text" id="dob" name="dob" value="<?php echo $_SESSION['dob'] ?>">
        </div>

        <div class="form-group details">
            <label for="phone">Phone No.:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <div class="form-group details">
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" value="<?php echo  $_SESSION['email'] ?>">
        </div>

        <div class="form-group details">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $_SESSION['address'].' '.$_SESSION['city'].' '.$_SESSION['province'].' '.$_SESSION['postalCode']?>">
        </div>

        <div class="form-group details">
            <label for="mother">Mother:</label>
            <input type="text" id="mother" name="mother" value="<?php echo $_SESSION['mother']?>">
        </div>    

        <div class="form-group details">
            <label for="father">Father:</label>
            <input type="text" id="father" name="father" value="<?php echo $_SESSION['father']?>">
        </div>

    </form> 
</div>

<?php include "includes/footer.php";?>