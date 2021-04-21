<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->
<div class="container">

    <div class="row">
        <div class="col-6">
        </div>

        <div class="col-6 peopleSearch">
            <form action="search-address.php" method="post">
                <input type="text" placeholder="Search by address..." name="search">
                <button class="btn btn-primary" name="submit" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of People</h3>

        </div>

        <div class="col-6">
            <a class="add-function" href='./add-person.php'><i class="fa fa-plus"></i> Add Person</a>
        </div>
    </div>


    <div class="row">
        <div class="col-1"></div>
        <div class="col-md-auto">
            <table id="population">
                    <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Medicare Card Number</th>
                    <th>Phone Number</th>
                    <th>Citizenship</th>
                    <th>Email</th>
                    <th>Mother</th>
                    <th>Father</th>
                    <th>Actions</th>
                    </tr>

            <?php
                $query ="SELECT * FROM Person WHERE Deleted = 0";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }



                while($row = mysqli_fetch_array($select_user_query)) {

                $db_firstName = $row['FirstName'];
                $db_lastName = $row['LastName'];
                $db_medCardNum = $row['Medicare'];
                $db_dob = $row['DOB'];
                $db_phone = $row['Phone'];
                $db_address = $row['Address'];
                $db_city = $row['City'];
                $db_province = $row['Province'];
                $db_postalCode = $row['PostalCode'];
                $db_citizenship = $row['Citizenship'];
                $db_email = $row['Email'];
                $db_mother = $row['Parent1'];
                $db_father = $row['Parent2'];
            

                    echo "<tr>";
                    echo "<td>{$db_firstName} {$db_lastName}</td>";
                    echo  "<td>{$db_dob}</td>";
                    echo  "<td>{$db_medCardNum}</td>";
                    echo  "<td>{$db_phone}</td>";
                    echo  "<td>{$db_citizenship}</td>";
                    echo  "<td>{$db_email}</td>";
                    echo  "<td>{$db_mother}</td>";
                    echo  "<td>{$db_father}</td>";
                    echo "<td class=\"action\"><a href='people.php?delete={$db_medCardNum}'><i class=\"fa fa-trash\"></i></a> <a href='edit-person.php?edit={$db_medCardNum}'><i class=\"fa fa-pencil\"> </i></a></td>";

                    echo "</tr>";

                 }
            ?>

            <?php
                global $connection;

                if(isset($_GET['delete'])) {
                    $medicare=$_GET['delete'];
                    $query_delete="DELETE FROM Person WHERE Medicare LIKE '$medicare'";
                    $check_query_delete = mysqli_query($connection, $query_delete);
                    header("Location: comp353_mainProj/people.php");
                }
            ?>

            </table>   
        </div>
        <div class="col-1"></div>
    </div>
    
<?php include "includes/footer.php";?>