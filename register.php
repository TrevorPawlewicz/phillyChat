<?php
    require 'config/config.php';
    require 'includes/form_handlers/login_handler.php';
    require 'includes/form_handlers/register_handler.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to phillyChat!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton|Bangers|Quicksand|Varela+Round">
    <link rel="stylesheet" href="assets/css/register_style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
</head>

<body>
    <!-- show errors -->
    <?php
        if (isset($_POST['register_button'])) {
            echo "
                <script>
                    $(document).ready(function() {
                        $('#login').hide();
                        $('#register').show();
                    });
                </script>
            ";
        };
    ?>




    <div class="wrapper">

        <div class="login-box">

            <div class="login-header">
                <h1>phillyChat</h1>
                <p>Login or Sign Up below!</p>
            </div>

            <div id="login">
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email Address"  value="<?php
                        if (isset($_SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        }
                        ?>"
                    required>

                    <br>
                    <input type="password" name="log_password" placeholder="Password">
                    <br>
                    <input type="submit" name="login_button" value="Login">

                    <?php
                        if (in_array("Email or Password was Incorrect! <br>", $error_array)) {
                            echo "Email or Password was Incorrect! <br>";
                        }
                    ?>
                    <br>

                    <a href="#" id="sign-up" class="sign-up">Need an Account? Register Here.</a>
                </form>
            </div>

            <br>

            <div id="register">
                <form action="register.php" method="POST">
                    <input type="text" name="reg_firstName" placeholder="First Name" value="<?php
                        if (isset($_SESSION['reg_firstName'])) {
                            echo $_SESSION['reg_firstName'];
                        }
                        ?>"
                    required>

                    <br>
                    <?php if (in_array("Your first name must be between 1 and 25 characters. <br>", $error_array)) {
                            echo "Your first name must be between 1 and 25 characters. <br>";
                        }
                    ?>

                    <input type="text" name="reg_lastName" placeholder="Last Name" value="<?php
                        if (isset($_SESSION['reg_lastName'])) {
                            echo $_SESSION['reg_lastName'];
                        }
                        ?>"
                    required>
                    <br>
                    <?php if (in_array("Your last name must be between 1 and 25 characters. <br>", $error_array)) {
                            echo "Your last name must be between 1 and 25 characters. <br>";
                        }
                    ?>

                    <input type="email" name="reg_email1" placeholder="Email" value="<?php
                        if (isset($_SESSION['reg_email1'])) {
                            echo $_SESSION['reg_email1'];
                        }
                        ?>"
                    required>
                    <br>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                        if (isset($_SESSION['reg_email2'])) {
                            echo $_SESSION['reg_email2'];
                        }
                        ?>"
                    required>
                    <br>
                    <?php if (in_array("Email already in use. <br>", $error_array)) {
                            echo "Email already in use. <br>";
                        } else if (in_array("Invalid email format. <br>", $error_array)) {
                            echo "Invalid email format. <br>";
                        } else if (in_array("Emails do not match! <br>", $error_array)) {
                            echo "Emails do not match! <br>";
                        }
                    ?>

                    <input type="password" name="reg_password1" placeholder="Password" required>
                    <br>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <?php if (in_array("Your passwords do not match! <br>", $error_array)) {
                            echo "Your passwords do not match! <br>";
                        } else if (in_array("Your password can only contain English characters or numbers. <br>", $error_array)) {
                            echo "Your password can only contain English characters or numbers. <br>";
                        } else if (in_array("Your password must be between 1 and 30 charaters. <br>", $error_array)) {
                            echo "Your password must be between 1 and 30 charaters. <br>";
                        }
                    ?>

                    <input type="submit" name="register_button" value="Register">
                    <br>

                    <?php if (in_array("<span style='color: #14C800'>You are Registered! Log In!</span><br>", $error_array)) {
                            echo "<span style='color: #14C800'>You are Registered! Log In!</span><br>";
                        }
                    ?>

                    <a href="#" id="sign-in" class="sign-in">Already have an Account? Sign in Here.</a>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
