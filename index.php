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


<?php include "includes/footer.php";?>