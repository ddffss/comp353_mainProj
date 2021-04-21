<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title">  List of People's Test Result</h3>

        </div>

        <div class="col-6 peopleSearch">
        <form action="search-p-diagnostic-result.php" method="post">
                 <input type="date" placeholder="Start date..." name="start">
                <input type="date" placeholder="End date..." name="end">
                <button class="btn btn-primary" name="submit" type="submit">Search</button>

        </form>
        </div>
    </div>

    <table id="population">
            <tr>
            <th>Name</th>      
            <th>Birthday</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Result</th>
            </tr>

    <?php
    
        $query1 ="SELECT * FROM Person p2 , Diagnostic d WHERE d.PatientMedicare = p2.Medicare AND d.Deleted = 0 AND p2.Deleted = 0 ORDER BY d.`Result` DESC";

        $select_user_query1 = (mysqli_query($connection, $query1));
        if(!$select_user_query1) {
        die("QUERY FAILED". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query1)) {

        $diagnostic_firstname = $row['FirstName'];
        $diagnostic_lastname = $row['LastName'];
        $diagnostic_dob = $row['DOB'];
        $diagnostic_phone = $row['Phone'];
        $diagnostic_email = $row['Email'];
        $diagnostic_result = $row['Result'];
    
    
            echo "<tr>";
            echo "<td>{$diagnostic_firstname} {$diagnostic_lastname}</td>";
            echo "<td>{$diagnostic_dob}</td>";
            echo "<td>{$diagnostic_phone}</td>";
            echo "<td>{$diagnostic_email}</td>";
            echo "<td>{$diagnostic_result}</td>";
            echo "</tr>";
    } ?>
    </table>

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> Public Health Worker with Covid-19</h3>

        </div>

        <div class="col-6 peopleSearch">
        <form action="search-phw.php" method="post">
                <input type="text" placeholder="Work Facility..." name="facility">
                <input type="date" placeholder="Date..." name="date">

                <button class="btn btn-primary" name="submit" type="submit">Search</button>
        </form>
        </div>


    </div>

    <table id="population">
            <tr>
            <th>Name</th>      
            <th>Work Facility</th>
            <th>List of Employees she Worked with</th>
            </tr>

    <?php
    

    $query2 ="SELECT * FROM PublicHealthWorker phw , Diagnostic d, Person p WHERE d.PatientMedicare = phw.Medicare AND phw.Medicare = p.Medicare AND d.Deleted = 0 AND p.Deleted = 0 AND d.Result = 1 ORDER BY d.`Result` DESC";

    $select_user_query2 = (mysqli_query($connection, $query2));
    if(!$select_user_query2) {
    die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user_query2)) {

    $phw_firstname = $row['FirstName'];
    $phw_lastname = $row['LastName'];
    $phw_facility = $row['WorkFacility'];

        echo "<tr>";
        echo "<td>{$phw_firstname} {$phw_lastname}</td>";
        echo "<td>{$phw_facility}</td>";
        echo "<td>list of co-workeers</td>";
        echo "</tr>";
    } ?>
    
    </table>   


</div>
    
<?php include "includes/footer.php";?>