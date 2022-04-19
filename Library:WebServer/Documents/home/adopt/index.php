<!-- Form code basis from https://www.w3schools.com/php/php_form_complete.asp -->

<!DOCTYPE html>
<html>
<body style="margin: 50px;">
<h1 style="text-align:center;">Adoption Form</h1>

<?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    }
    }

    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    }

    if (empty($_POST["pet"])) {
    $pet = "";
    } else {
    $pet = test_input($_POST["pet"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    }

    if (empty($_POST["why"])) {
    $why = "";
    } else {
    $why = test_input($_POST["why"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Pet Name: <input type="text" name="pet" value="<?php echo $pet;?>">
    <br><br>
    What makes you a good fit? <textarea name="why" rows="5" cols="40"><?php echo $why;?></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html> 
