<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['edit_recommendation'])) {

    $recommendation = $_POST['recommendation'];
    $id = $_POST['id'];

    echo   $recommendation;

    $query = "INSERT INTO HealthRecommendations(Recommendation) ";
    $query .= "VALUES('{$recommendation}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: phrecommendation.php");

} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-auto">
            <h3>Add Employee</h3>

            <form action="./add-recommendation.php" method="post">

                <div class="add form-group">
                    <label class="textarea" for="recommendation">Recommendation</label>
                    <textarea name="recommendation" rows="4" cols="50">
                    </textarea>                
                </div>              
                
                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="edit_recommendation" value="Add recommendation">
                </div>

            </form>  
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>