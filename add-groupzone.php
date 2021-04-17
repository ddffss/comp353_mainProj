<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['edit_groupzone'])) {

    $groupzone_name = $_POST['groupzone'];
    $groupzone_medicare = $_POST['medicare'];


    $query = "INSERT INTO `GroupZone` (`ZoneName`, `Medicare`) ";
    $query .= "VALUES('{$groupzone_name}','{$groupzone_medicare}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: groupzones.php");

} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-auto">
            <h3>Add Group Zone</h3>

            <form action="./add-groupzone.php" method="post">

               
            <div class="add form-group">
                    <label for="groupzone">Group Zone Name</label>
                    <input type="text" name="groupzone">
            <div>

            <div class="add form-group">
                    <label for="medicare">Medicare Card</label>
                    <input type="text" name="medicare">
            <div>


                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="edit_groupzone" value="Add Group Zone">
                </div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>