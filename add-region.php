<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['add_region'])) {

    $region_level = $_POST['zonelevel'];
    $region_name = $_POST['zonename']; 
    $region_city = $_POST['city'];
    $region_zip = $_POST['zip'];

    $query1 = "INSERT INTO ZoneLevels(`GroupZone`, `ZoneLevel`) ";
    $query1 .= "VALUES('{$region_name}', '{$region_level}')";

    $query2 = "INSERT INTO ZoneMuni(`Municipality`, `﻿ZoneName`)";
    $query2 .= "VALUES('{$region_city}', '{$region_name}')";

    $query3 = "INSERT INTO Municipalities(`City`, `Zip`)";
    $query3 .= "VALUES('{$region_city}', '{$region_zip}')";

    $create_query1 = mysqli_query($connection, $query1);
    $create_query2 = mysqli_query($connection, $query2);
    $create_query3 = mysqli_query($connection, $query3);

    // confirmQuery($create_post_query);
    if(!$create_query1) {
        die('QUERY FAILED' . mysqli_error($connection));
    }

    if(!$create_query2) {
        die('QUERY FAILED' . mysqli_error($connection));
    }

    if(!$create_query3) {
        die('QUERY FAILED' . mysqli_error($connection3));
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
                        <label for="zonelevel">Zone Level</label>
                            <select name="zonelevel" id="facility">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=3>4</option>
                            </select>    
                <div>

                <div class="add form-group">
                    <label for="zonename">Zone Name</label>
                    <input type="text" name="zonename">
                <div>

                <div class="add form-group">
                    <label for="city">City</label>
                    <input type="text" name="city">
                <div>

                <div class="add form-group">
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
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