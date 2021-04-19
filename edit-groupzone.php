<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $id=$_GET['edit'];
        $query="SELECT * FROM GroupZone WHERE id LIKE '%$id%'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)) {

            $groupzone_name = $row['ZoneName'];
            $groupzone_medicare = $row['Medicare'];
            $groupzone_id = $row['id'];
        }
    }

    if(isset($_POST['edit_groupzone'])) {
       
        $groupzone_name = $_POST['name'];
        $groupzone_medicare = $_POST['medicare'];
        $groupzone_id = $_POST['id'];


        $query = "UPDATE GroupZone SET ";
        $query .="ZoneName ='{$groupzone_name}', ";
        $query .="Medicare ='{$groupzone_medicare}' ";
        $query .="WHERE id LIKE '%$groupzone_id%'";
        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: groupzones.php");

    }



?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-groupzone.php" method="post" enctype="multipart/form-data">


                <div class="edit form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $groupzone_name; ?>">
                </div>

                <div class="edit form-group">
                    <label for="medicare">Medicare</label>
                    <input type="text" name="medicare" value="<?php echo $groupzone_medicare; ?>">
                </div>

                <div class="edit form-group" style="display:none;">
                <!-- <div class="edit form-group"> -->
                    <label for="id">ID</label>
                    <input type="text" name="id" value="<?php echo $groupzone_id; ?>">
                </div>

                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_groupzone" value="Update">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>