<?php
    require 'config/config.php';

    if (isset($_SESSION['username'])) {
        // logged in. Use name:
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);

    } else {
        // not logged in. Redirect back:
        header("Location: register.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>phillyChat!</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton|Bangers|Quicksand|Varela+Round">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main_style.css">
</head>

<body>

    <div class="top-bar">
        <div class="logo">
            <a href="index.php">phillyChat <i class="fa fa-bell-o"></i></a>
        </div>

        <nav>
            <a href="#">
                <?php echo $user['first_name']; ?>
                <i class="fa fa-user-o" aria-hidden="true"></i>
            </a>
            <a href="#">Home <i class="fa fa-home"></i></a>
            <a href="#">stuff<i class="fa fa-user-o" aria-hidden="true"></i></a>
            <a href="#">yep</a>
        </nav>
    </div>
