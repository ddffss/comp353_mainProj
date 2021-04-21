<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
    <div class="row">
        <div class="col-6">
        </div>

        <div class="col-6 peopleSearch">
            <form action="search-phw-facility.php" method="post">
                <input type="text" placeholder="Search by facility..." name="search">
                <button class="btn btn-primary" name="submit" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of Public Health Workers</h3>

        </div>

        <div class="col-6">
            <a class="add-function" href='./add-worker.php'><i class="fa fa-plus"></i> Add Public Health Worker</a>
        </div>
    </div>

            <table id="population">
                    <tr>
                    <th>Name</th>      
                    <th>Medicare</th>      
                    <th>Work Facility</th>
                    <th>Shift</th>
                    <th>Actions</th>
                    </tr>

            <?php
                
                $query ="SELECT * FROM PublicHealthWorker WHERE Deleted = 0 GROUP BY Medicare ";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_medicare = $row['Medicare'];
                $db_workFacility = $row['WorkFacility'];
                $db_shift = $row['Shift'];
                $db_shiftStart = $row['ShiftStart'];
                $db_shiftEnd = $row['ShiftEnd'];
           
                   echo "<tr>";
                    ?> 
                <?php
                   $queryName = "SELECT * FROM Person WHERE Medicare LIKE '%$db_medicare%' GROUP BY Medicare"; 
                   $select_query_name = (mysqli_query($connection, $queryName));
                   if(!$select_query_name) {
                       die("QUERY FAILED". mysqli_error($connection));
                   }
                       while($row = mysqli_fetch_array($select_query_name)){
                            $firstName= $row['FirstName'];
                            $lastName = $row['LastName'];
                }
                   echo "<td>{$firstName} {$lastName}</td>";
                   echo "<td>{$db_medicare}</td>";
                   echo "<td>{$db_workFacility}</td>";
                   echo "<td>{$db_shift}</td>";
                   echo "<td class=\"action\"> <a href='phworkers.php?delete={$db_medicare}'><i class=\"fa fa-trash\"> </i></a> <a href='edit-worker.php?edit={$db_medicare}'><i class=\"fa fa-pencil\"> </i></a></td>";

                   echo "</tr>";
                }

          ?>

        
        <?php
            global $connection;

              if(isset($_GET['delete'])) {
                $medicare = $_GET['delete'];
                $query_delete="DELETE FROM PublicHealthWorker WHERE Medicare LIKE '$medicare'";
                $check_query_delete = mysqli_query($connection, $query_delete);
                header("Location: phworkers.php");
              }
        ?>


            </table>   
</div>
    
<?php include "includes/footer.php";?>