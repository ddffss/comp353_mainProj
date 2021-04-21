<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['add_region'])) {

    $region_name = $_POST['zonename'];
    $region_municipality = $_POST['municipality'];

    $query = "INSERT INTO ZoneMuni(`Municipality`, `﻿ZoneName`) ";
    $query .= "VALUES('{$region_municipality}', '{$region_name}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: regions.php");

} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-auto">
            <h3>Add Region</h3>

            <form action="./add-region.php" method="post">

               
            <div class="add form-group">
                    <label for="zonename">Zone Name</label>
                    <input type="text" name="zonename">
                <div>

                <div class="add form-group">
                    <label for="municipality">Municipality</label>
                    <input type="text" name="municipality">
                <div>

                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="add_region" value="Add Region">
                </div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>