<?php
    require 'config/config.php';

    if (isset($_SESSION['username'])) {
        // logged in. Use name:
        $userLoggedIn = $_SESSION['username'];
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
</head>

<body>
