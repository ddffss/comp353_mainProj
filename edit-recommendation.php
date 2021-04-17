<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $id=$_GET['edit'];
        $query="SELECT * FROM HealthRecommendations WHERE RecID LIKE '$id'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)) {
     
            $recommendation = $row['Recommendation'];
            $id =  $row['RecID'];
        }
    }

    if(isset($_POST['edit_recommendation'])) {
       
        $recommendation = $_POST['recommendation'];
        $id = $_POST['id'];

        $query = "UPDATE HealthRecommendations SET ";
        $query .="Recommendation ='{$recommendation}' ";
        $query .="WHERE RecID LIKE '%$id%'";
        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: phrecommendation.php");

    }



?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-recommendation.php" method="post" enctype="multipart/form-data">


                <div class="edit form-group">
                    <label class="textarea" for="recommendation">Recommendation</label>
                    <textarea name="recommendation" rows="4" cols="50">
                    <?php echo $recommendation; ?></textarea>  
                </div>

                <div class="edit form-group" style="display:none;">
                    <label for="id">Medicare</label>
                    <input type="text" name="id" value="<?php echo $id; ?>">
                </div>


                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_recommendation" value="Update">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>