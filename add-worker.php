<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['edit_worker'])) {

    $worker_medicare = $_POST['medicare'];
    $worker_facility = $_POST['workfacility'];
    $worker_shift = $_POST['shift'];


    $query = "INSERT INTO PublicHealthWorker(Medicare, WorkFacility, Shift) ";
    $query .= "VALUES('{$worker_medicare}', '{$worker_facility}','{$worker_shift}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: phworkers.php");

} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-auto">
            <h3>Add Employee</h3>

            <form action="./add-worker.php" method="post">

               
            <div class="add form-group">
                    <label for="medicare">Medicare Card</label>
                    <input type="text" name="medicare">
                <div>

                <div class="add form-group">
                    <label for="workfacility">Work Facility</label>
                    <input type="text" name="workfacility">
                <div>

                <div class="add form-group">
                    <label for="shift">Shift</label>
                    <input type="text" name="shift">
                <div>

                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="edit_worker" value="Add Employee">
                </div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>