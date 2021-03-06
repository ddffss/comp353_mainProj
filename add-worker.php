<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['edit_worker'])) {


    $worker_fname = $_POST['fname'];
    $worker_lname = $_POST['lname'];
    $worker_medicare = $_POST['medicare'];
    $worker_facility = $_POST['workfacility'];
    $worker_shift = $_POST['shift'];
    $worker_shiftStart = $_POST['shiftstart'];
    $worker_shiftEnd = $_POST['shiftend'];

    // INSERT INTO `hec353_4`.`PublicHealthWorker` (`Medicare`, `WorkFacility`, `Shift`, `ShiftStart`, `ShiftEnd`) VALUES ('SMIJ-9004-1403', 'MUHC', 'Morning', '2021-01-10', '2021-01-30');


    $query1 = "INSERT INTO Person(`Medicare`, `FirstName`, `LastName`) ";
    $query1 .= "VALUES('{$worker_medicare}', '{$worker_fname}', '{$worker_lname}')";


    $query2 = "INSERT INTO PublicHealthWorker(`Medicare`, `WorkFacility`, `Shift`, `ShiftStart`, `ShiftEnd`) ";
    $query2 .= "VALUES('{$worker_medicare}', '{$worker_facility}','{$worker_shift}','{$worker_shiftStart}','{$worker_shiftEnd}')";

    $create_user_query1 = mysqli_query($connection, $query1);

    $create_user_query2 = mysqli_query($connection, $query2);


    // confirmQuery($create_post_query);
    if(!$create_user_query1) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    if(!$create_user_query2) {
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
                    <label for="fname">First Name</label>
                    <input type="text" name="fname">
                <div>

                <div class="add form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname">
                <div>

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
                        <select name="shift" id="shift">
                            <option value="Morning">Morning</option>
                            <option value="Evening">Evening</option>
                            <option value="Night">Night</option>
                        </select>            
                    <div>

                <div class="add form-group">
                    <label for="shiftstart">Shift Start</label>
                    <input type="date" name="shiftstart">
                <div>

                <div class="add form-group">
                    <label for="shiftend">Shift End</label>
                    <input type="date" name="shiftend">
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