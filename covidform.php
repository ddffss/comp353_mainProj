<?php include "includes/db.php";?>

<?php session_start();?>
<?php include "includes/header.php";?>
<?php include "includes/prof-nav.php";?>



<?php

    $query ="SELECT * FROM Person";

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
    }

?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <span class="dot"></span>
        </div>
        <div class="col-10">
            <p class="profile"><?php echo $db_firstName.' '.$db_lastName ?></p>
            <p class="profile"><?php echo $db_medCardNum ?></p>
            <p class="profile"><?php echo $db_phone ?></p>
        </div>
    </div>
    <br>
    <?php include "includes/prof-sub-nav.php";?>
    <hr>
    </div>
    <br>


    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-auto">
        <h3 class="covidform">Covid-19 Follow-up Form Day 1</h3>

        <form action="/action_page.php">
            <div class="form-group symptoms">
                <label for="name">Date:</label>
                <input type="text" id="date" name="date" value="">
            </div>

            <div class="form-group symptoms">
                <label for="medicare">Time:</label>
                <input type="text" id="time" name="time" value="">
            </div>

            <div class="form-group symptoms">
                <label for="dob">Temperature:</label>
                <input type="text" id="temperature" name="temperature" value="">
            </div>

            <h6 class="symptoms">Check your symptoms</h6>

            <div class="form-group symptoms">
                <input type="checkbox" class="symptom" name="fever">
                <label for="phone">Fever</label>
            </div>

            <div class="form-group symptoms">
                <label for="email">Cough</label>
                <input type="checkbox" class="symptom" name="cough">
            </div>

            <div class="form-group symptoms">
                <label for="address">Difficulty breathing</label>
                <input type="checkbox" class="symptom" name="difficultybreathing">
            </div>

            <div class="form-group symptoms">
                <label for="mother">Loss of taste and smell</label>
                <input type="checkbox" class="symptom" name="lossoftaste">
            </div>    

            <div class="form-group symptoms">
                <label for="father">Nausea</label>
                <input type="checkbox" class="symptom" name="nausea">
            </div>

            <div class="form-group symptoms">
                <label for="phone">Stomach Aches</label>
                <input type="checkbox" class="symptom" name="stomachache">
            </div>

            <div class="form-group symptoms">
                <label for="email">Vomiting</label>
                <input type="checkbox" class="symptom" name="vomiting">
            </div>

            <div class="form-group symptoms">
                <label for="address">Headache</label>
                <input type="checkbox" class="symptom" name="headache">
            </div>

            <div class="form-group symptoms">
                <label for="mother">Muscle Pain</label>
                <input type="checkbox" class="symptom" name="musclepain">
            </div>    

            <div class="form-group symptoms">
                <label for="father">Diarrhea</label>
                <input type="checkbox" class="symptom" name="diarrhea">
            </div>

            <div class="form-group symptoms">
                <label for="address">Sore Throat</label>
                <input type="checkbox" class="symptom" name="sorethroat">
            </div>

            <div class="form-group symptoms">
                <label for="medicare">Other Symptoms:</label>
                <input type="text" id="other" name="other" value="">
            </div>
            <button class="btn btn-primary submit" name="submit" type="submit">Submit</button>
        </form> 
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include "includes/footer.php";?>