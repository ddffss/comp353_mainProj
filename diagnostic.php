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
                <input type="text" placeholder="Search by address..." name="search">
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
    
        $query ="SELECT * FROM Person p2 , Diagnostic d WHERE d.PatientMedicare = p2.Medicare ORDER BY d.`Result` DESC";

        $select_user_query = (mysqli_query($connection, $query));
        if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)) {

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
            <h3 class="page-title"> Regions Covid-19 Report</h3>

        </div>

        <div class="col-6 peopleSearch">
        <form action="search-p-diagnostic-result.php" method="post">
                <input type="text" placeholder="Search by address..." name="search">
                <button class="btn btn-primary" name="submit" type="submit">Search</button>
        </form>
        </div>
    </div>

    <table id="population">
            <tr>
            <th>Name</th>      
            <th># of People (+) from covid</th>
            <th># of People (-) from covid</th>
            <th>Alert History</th>
            </tr>


    </table>   

<div class="row"> 
    <div class="col-6">
        <h3 class="page-title"> Public Health Worker Covid-19 Report</h3>

    </div>

    <div class="col-6 peopleSearch">
    <form action="search-p-diagnostic-result.php" method="post">
            <input type="text" placeholder="Search by address..." name="search">
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


</table>   


</div>
    
<?php include "includes/footer.php";?>