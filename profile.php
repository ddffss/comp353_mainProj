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
        $_SESSION['firstname'] = $db_firstName;
        $_SESSION['lastname'] =$db_lastName;
        $_SESSION['medicare'] =$db_medCardNum;
        $_SESSION['dob'] =$db_dob;
        $_SESSION['phone'] =$db_phone;
        $_SESSION['address'] =$db_address;
        $_SESSION['city'] =$db_city;
        $_SESSION['province'] =$db_province;
        $_SESSION['postalCode'] =$db_postalCode;
        $_SESSION['citizenship'] =$db_citizenship;
        $_SESSION['email'] =$db_email;
        $_SESSION['mother'] =$db_mother;
        $_SESSION['father'] =$db_father;
        
    }

?>
<div class="container">
<div class="row profile">
    <div class="col-2">
        <span class="dot"></span>
    </div>
    <div class="col-9">
        <p class="profile"><?php echo $_SESSION['firstname'].' '. $_SESSION['lastname'] ?></p>
        <p class="profile"><?php echo $_SESSION['medicare'] ?></p>
        <p class="profile"><?php echo $_SESSION['phone'] ?></p>
    </div>
</div>

<br>
<?php include "includes/prof-sub-nav.php";?>
<hr>
</div>


<?php include "includes/footer.php";?>