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

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-auto">
        <h3 class="covidform">Covid-19 Follow-up Form</h3>

        <form action="/covidform.php">
            <div class="form-group symptoms">
                <label for="name">Date:</label>
                <input type="text" id="date" name="date" value="">
            </div>

            <div class="add form-group">
                <label for="medicare">Time:</label>
                <input type="text" id="time" name="time" value="">
            </div>

            <div class="add form-group">
                <label for="medicare">Time:</label>
                <input type="text" id="time" name="time" value="">
            </div>

            <div class="add form-group">
                <label for="dob">Temperature:</label>
                <input type="text" id="temperature" name="temperature" value="">
            </div>

            <h6 class="symptoms">Check your symptoms</h6>

            <div class="add form-group">
                <input type="checkbox" class="symptom" name="fever">
                <label for="phone">Fever</label>
            </div>

            <div class="add form-group">
                <label for="email">Cough</label>
                <input type="checkbox" class="symptom" name="cough">
            </div>

            <div class="add form-group">
                <label for="address">Difficulty breathing</label>
                <input type="checkbox" class="symptom" name="difficultybreathing">
            </div>

            <div class="add form-group">
                <label for="mother">Loss of taste and smell</label>
                <input type="checkbox" class="symptom" name="lossoftaste">
            </div>    

            <div class="add form-group">
                <label for="father">Nausea</label>
                <input type="checkbox" class="symptom" name="nausea">
            </div>

            <div class="add form-group">
                <label for="phone">Stomach Aches</label>
                <input type="checkbox" class="symptom" name="stomachache">
            </div>

            <div class="add form-group">
                <label for="email">Vomiting</label>
                <input type="checkbox" class="symptom" name="vomiting">
            </div>

            <div class="add form-group">
                <label for="address">Headache</label>
                <input type="checkbox" class="symptom" name="headache">
            </div>

            <div class="add form-group">
                <label for="mother">Muscle Pain</label>
                <input type="checkbox" class="symptom" name="musclepain">
            </div>    

            <div class="add form-group">
                <label for="father">Diarrhea</label>
                <input type="checkbox" class="symptom" name="diarrhea">
            </div>

            <div class="add form-group">
                <label for="address">Sore Throat</label>
                <input type="checkbox" class="symptom" name="sorethroat">
            </div>

            <div class="add form-group">
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