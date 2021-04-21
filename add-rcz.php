<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<?php

if(isset($_POST['add-rcz'])) {

$region_name = $_POST['zonename']; 
$region_city = $_POST['city'];
$region_zip = $_POST['zip'];

$query2 = "INSERT INTO ZoneMuni(`Municipality`, `﻿ZoneName`)";
$query2 .= "VALUES('{$region_city}', '{$region_name}')";

$query3 = "INSERT INTO Municipalities(`City`, `Zip`)";
$query3 .= "VALUES('{$region_city}', '{$region_zip}')";

$create_query2 = mysqli_query($connection, $query2);
$create_query3 = mysqli_query($connection, $query3);


// if(!$create_query2) {
//     die('QUERY FAILED2' . mysqli_error($connection));
// }

// if(!$create_query3) {
//     die('QUERY FAILED3' . mysqli_error($connection));
// }
header("Location: regions.php");


} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-auto">
            <h3>Add City</h3>

            <form action="./add-rcz.php" method="post">

                <div class="add form-group">
                    <label for="city">City</label>
                    <input type="text" name="city">
                <div>

                <div class="add form-group">
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                <div>

                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="add-rcz" value="Add City">
                </div>

                <div class="add form-group" style="display:none;">
                    <label for="zonename">Zone Name</label>
                    <input type="text" name="zonename" value="<?php echo $_SESSION['groupzonename'];?> "> 
                <div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>