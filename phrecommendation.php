<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

    <div class="row"> 
        <div class="col-9">
            <h3 class="page-title"> Public Health Information and Recommendations: </h3>

        </div>

        <div class="col-3">
            <a class="add-function" href='./add-recommendation.php'><i class="fa fa-plus"></i> Add Recommendation</a>
        </div>
    </div>

            <table id="population">
                    <tr>
                    <th>Recommendations</th>      
                    <th style="text-align:center">Actions</th>
                    </tr>

            <?php
                
                $query ="SELECT * FROM HealthRecommendations WHERE Deleted = 0";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $recommendation = $row['Recommendation'];
                $id= $row['RecID'];
           
                   echo "<tr>";
                   echo "<td>{$recommendation}</td>";
                   echo "<td class=\"action\"> <a href='phrecommendation.php?delete={$id}'><i class=\"fa fa-trash\"> </i></a> <a href='edit-recommendation.php?edit={$id}'><i class=\"fa fa-pencil\"> </i></a></td>";

                   echo "</tr>";
                }

          ?>
        
        <?php
            global $connection;

              if(isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $query_delete="DELETE FROM HealthRecommendations WHERE RecID LIKE '$id'";
                $check_query_delete = mysqli_query($connection, $query_delete);
                header("Location: phrecommendation.php");
              }
        ?>


            </table>   
</div>
    
<?php include "includes/footer.php";?>