<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/prof-nav.php";?>


<div class="container">
<div class="row profile">
    <div class="col-2">
        <span class="dot"></span>
    </div>
    <div class="col-9">
        <p class="profile"><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></p>
        <p class="profile"><?php echo $_SESSION['medCardNum'] ?></p>
        <p class="profile"><?php echo $_SESSION['phone'] ?></p>
    </div>
    <div class="col-1"></div>

<br>
<?php include "includes/prof-sub-nav.php";?>
<hr>
</div>
<br>

<div class="container">

    <div class="row"> 
        <div class="col-6">
           <h3 class="page-title"> Detail Progress of all Sysmptoms </h3>
        </div>

        <div class="col-6">
        </div>
    </div>


    <table class="facility-table">
        <tr>
        <th>Date </th>
        <th>Fever</th>
        <th>Cough</th>
        <th>Difficulty Breathing</th>
        <th>Loss Of Taste/Smell</th>
        <th>Nausea</th>
        <th>Stomach Aches</th>
        <th>Vomiting</th>
        <th>Headache</th>
        <th>MusclePain</th>
        <th>Diarrhea</th>
        <th>Sorethroat</th>
        <th>Others</th>
        </tr>

    <?php
       $medicare =$_SESSION['medCardNum'];
       $dateofresult =  $_SESSION['dateofresult'];
       $query ="SELECT * FROM Person, Diagnostic, SymptomHistory WHERE Person.Medicare = Diagnostic.PatientMedicare AND Diagnostic.DateOfResult = SymptomHistory.DateOfResult AND Person.Medicare LIKE '$medicare' AND Diagnostic.DateOfResult LIKE '$dateofresult'";

        // function below will pull out the result
        $select_user_query = (mysqli_query($connection, $query));
        if(!$select_user_query) {
            die("QUERY FAILED". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)) {

            $date = $row['DateOfSymptom'];
            $fever = $row['Fever'];
            $cough = $row['Cough'];
            $difficultybreathing = $row['DifficultyBreathing'];
            $lossoftaste = $row['LossOfTasteOrSmell'];
            $nausea = $row['Nausea'];
            $stomachache = $row['StomachAches'];
            $vomiting = $row['Vomiting'];
            $headache = $row['Headache'];
            $musclepain = $row['MusclePain'];
            $diarrhea = $row['Diarrhea'];
            $sorethroat = $row['SoreThroat'];
            $others = $row['OtherSymptoms'];




            echo "<tr>";
            echo "<td>{$date}</td>";
            echo "<td>{$fever}</td>";
            echo "<td>{$cough}</td>";
            echo "<td>{$difficultybreathing}</td>";
            echo "<td>{$lossoftaste}</td>";
            echo "<td>{$nausea}</td>";
            echo "<td>{$stomachache }</td>";
            echo "<td>{$vomiting}</td>";
            echo "<td>{$headache}</td>";
            echo "<td>{$musclepain}</td>";
            echo "<td>{$diarrhea}</td>";
            echo "<td>{$sorethroat}</td>";
            echo "<td>{$others}</td>";
        }    ?>

           
    </table>  
    </div>

<?php include "includes/footer.php";?>