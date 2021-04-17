<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $medicare=$_GET['edit'];
        $query="SELECT * FROM PublicHealthWorker WHERE Medicare LIKE '$medicare'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)) {

            $worker_medicare = $row['Medicare'];
            $worker_facility = $row['WorkFacility'];
            $worker_shift = $row['Shift'];
        }
    }

    if(isset($_POST['edit_worker'])) {

        $worker_medicare = $_POST['medicare'];
        $worker_facility = $_POST['workfacility'];
        $worker_shift = $_POST['shift'];


        $query = "UPDATE PublicHealthWorker SET ";
        $query .= "Medicare ='{$worker_medicare}', ";
        $query .= "WorkFacility ='{$worker_facility}', ";
        $query .= "Shift ='{$worker_shift}' ";
        $query .="WHERE Medicare LIKE '%$worker_medicare%' "  ;
        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: phworkers.php");

    }



?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-worker.php" method="post" enctype="multipart/form-data">

                <div class="edit form-group">
                    <label for="medicare">Medicare</label>
                    <input type="text" name="medicare" value="<?php echo  $worker_medicare; ?>">
                </div>

                <div class="edit form-group">
                    <label for="workfacility">Work Facility</label>
                    <input type="text" name="workfacility" value="<?php echo $worker_facility; ?>">
                </div>

                <div class="edit form-group">
                    <label for="dob">Shift</label>
                    <input type="text" name="shift" value="<?php echo $worker_shift;?>">
                </div>

                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_worker" value="Update">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>