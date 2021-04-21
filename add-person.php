<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>



<?php

if(isset($_POST['add_user'])) {

    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['email'];
    $user_dob = $_POST['dob'];
    $user_phone = $_POST['phone'];
    $user_medicare = $_POST['medicare'];
    $user_address = $_POST['address'];
    $user_city = $_POST['city'];
    $user_postalcode = $_POST['postalcode'];
    $user_province = $_POST['province'];
    $user_citizenship = $_POST['citizenship'];
    $user_mother = $_POST['mother'];
    $user_father = $_POST['father'];

    $query = "INSERT INTO Person(Medicare, FirstName, LastName, DOB, Phone, Address,City, Province, PostalCode, Citizenship, Email, Parent1, Parent2) ";
    $query .= "VALUES('{$user_medicare}', '{$user_firstname}','{$user_lastname}','{$user_dob}','{$user_phone}','{$user_address}', '{$user_city}', '{$user_province}', '{$user_postalcode}', '{$user_citizenship}','{$user_email}', '{$user_mother}','{$user_father}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: comp353_mainProj/people.php");

} 

?>


<!-- search people by address -->
<div class="container">
    <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-auto">
            <h3>Add Person</h3>

            <form action="./add-person.php" method="post">

                <div class="add form-group">
                    <label for="title">Medicare Card</label>
                    <input type="text" name="medicare">
                <div>

                <div class="add form-group">
                    <label for="title">First Name</label>
                    <input type="text" name="firstname">
                <div>

                <div class="add form-group">
                    <label for="title">Last Name</label>
                    <input type="text" name="lastname">
                <div>

                <div class="add form-group">
                    <label for="title">Birthday</label>
                    <input type="date" name="dob">
                <div>

                <div class="add form-group">
                    <label for="title">Phone</label>
                    <input type="text" name="phone">
                <div>

                <div class="add form-group">
                    <label for="title">Address</label>
                    <input type="text" name="address">
                <div>

                <div class="add form-group">
                    <label for="title">City</label>
                    <input type="text" name="city">
                <div>

                <div class="add form-group">
                    <label for="title">Province</label>
                    <input type="text" name="province">
                <div>

                <div class="add form-group">
                    <label for="title">Postal Code</label>
                    <input type="text" name="postalcode">
                <div>

                <div class="add form-group">
                    <label for="title">Citizenship</label>
                    <input type="text" name="citizenship">
                <div>

                <div class="add form-group">
                    <label for="title">Email</label>
                    <input type="email" name="email">
                <div>

                <div class="add form-group">
                    <label for="title">Mother</label>
                    <input type="text" name="mother">
                <div>

                <div class="add form-group">
                    <label for="title">Father</label>
                    <input type="text" name="father">
                <div>

                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="add_user" value="Add Person">
                </div>

            </form>  
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    
<?php include "includes/footer.php";?>