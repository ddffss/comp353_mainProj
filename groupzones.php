<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of Group Zones</h3>

        </div>

        <div class="col-6">
            <a class="add-function" href='./add-groupzone.php'><i class="fa fa-plus"></i> Add Group Zones</a>
        </div>
    </div>

            <table id="population">
                    <tr>
                    <th>Group Zone Name</th>      
                    <th>Medicare</th>
                    <th>Actions</th>

                    </tr>

            <?php
                
                $query ="SELECT * FROM GroupZone";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_groupzone = $row['ZoneName'];
                $db_medicare = $row['Medicare'];
                $db_id = $row['id'];

                   echo "<tr>";
                   echo "<td>{$db_groupzone}</td>";
                   echo "<td>{$db_medicare}</td>";
                   echo "<td class=\"action\"> <a href='groupzones.php?delete={$db_id}'><i class=\"fa fa-trash\"> </i></a> <a href='edit-groupzone.php?edit={$db_id}'><i class=\"fa fa-pencil\"> </i></a></td>";

                   echo "</tr>";
                }

          ?>
        
        <?php
            global $connection;

              if(isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $query_delete="DELETE FROM GroupZone WHERE id LIKE '$id'";
                $check_query_delete = mysqli_query($connection, $query_delete);
                header("Location: groupzones.php");
              }
        ?>


            </table>   
</div>
    
<?php include "includes/footer.php";?>