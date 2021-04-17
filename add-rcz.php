<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['edit_region'])) {

    $region_city = $_POST['city'];
    $region_zip = $_POST['zip'];


    $query = "INSERT INTO Municipalities(City, Zip) ";
    $query .= "VALUES('{$region_city}', '{$region_zip}')";

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
            <h3>Add Employee</h3>

            <form action="./add-region.php" method="post">

               
            <div class="add form-group">
                    <label for="city">City</label>
                    <input type="text" name="city">
                <div>

                <div class="add form-group">
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                <div>

                <div class="add form-group">
                    <label for="alert">Alert Status</label>
                    <input type="text" name="alert">
                <div>

                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="edit_region" value="Add Region">
                </div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>