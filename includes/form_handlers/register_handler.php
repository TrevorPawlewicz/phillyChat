<?php

// variables to prevent errors:
$firstName = "";
$lastName = "";
$email1 = "";
$email2 = "";
$password1 = "";
$password2 = "";
$date = "";        // sign up date
$error_array = array(); //hold error messages

if (isset($_POST['register_button'])) {
    // register form values:
    $firstName = strip_tags($_POST['reg_firstName']); // remove HTML tags
    $firstName = str_replace(' ', '', $firstName); // remove spaces
    $firstName = ucfirst(strtolower($firstName)); // uppercase FIRST letter
    $_SESSION['reg_firstName'] = $firstName; // store session variable

    $lastName = strip_tags($_POST['reg_lastName']);
    $lastName = str_replace(' ', '', $lastName);
    $lastName = ucfirst(strtolower($lastName));
    $_SESSION['reg_lastName'] = $lastName;

    $email1 = strip_tags($_POST['reg_email1']);
    $email1 = str_replace(' ', '', $email1);
    $email1 = ucfirst(strtolower($email1));
    $_SESSION['reg_email1'] = $email1;

    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = str_replace(' ', '', $email2);
    $email2 = ucfirst(strtolower($email2));
    $_SESSION['$reg_email2'] = $email2;

    $password1 = strip_tags($_POST['reg_password1']); // remove HTML tags
    $password2 = strip_tags($_POST['reg_password2']); // remove HTML tags

    $date = date("Y-m-d"); // get current date

    // check if emails match: ---------------------------------------------
    if ($email1 == $email2) {
        // check for valid email format:
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email1, FILTER_VALIDATE_EMAIL);

            // check if email exists:
            $email_check = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");

            // count number of rows returned:
            $num_rows = mysqli_num_rows($email_check);

            if ($num_rows > 0) {
                //echo "Email already in use";
                array_push($error_array, "Email already in use. <br>");
            }

        } else {
            //echo "Invalid email format!";
            array_push($error_array, "Invalid email format. <br>");
        }
    } else {
        array_push($error_array, "Emails do not match! <br>");
    }

    // check length of first and last names: ------------------------------
    if ((strlen($firstName) > 25) || (strlen($firstName) < 1)) {
        array_push($error_array, "Your first name must be between 1 and 25 characters. <br>");
    }
    if ((strlen($lastName) > 25) || (strlen($lastName) < 1)) {
        array_push($error_array,  "Your last name must be between 1 and 25 characters. <br>");
    }

    // check that passwords match: ----------------------------------------
    if ($password1 != $password2) {
        array_push($error_array, "Your passwords do not match! <br>");
    } else {
        if (preg_match('/[^A-Za-z0-9]/', $password1)) {
            array_push($error_array, "Your password can only contain English characters or numbers. <br>");
        }
    }

    // check password length: ---------------------------------------------
    if ((strlen($password1) > 25) || (strlen($password1) < 1)) {
        array_push($error_array, "Your password must be between 1 and 30 charaters. <br>");
    }

    // if NO ERRORS...-----------------------------------------------------
    if (empty($error_array)) {
        $password1 = md5($password1); // encrypt password

        $username = strtolower($firstName . "_" . $lastName);
        $check_username_query = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");

        $i = 0;
        // if username exists add number to username:
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
        }

        // profile picture
        $profile_pic = "assets/images/profile_pics/default_profile_pic.png";

        $query = mysqli_query($connect, "INSERT INTO users VALUES ('', '$firstName', '$lastName', '$username', '$email1', '$password1', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14C800'>You are Registered! Log In!</span><br>");

        // clear session variable:
        $_SESSION['reg_firstName'] = "";
        $_SESSION['reg_lastName'] = "";
        $_SESSION['reg_email1'] = "";
        $_SESSION['reg_email2'] = "";
    }
}

?>
