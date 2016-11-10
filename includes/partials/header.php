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
</head>

<body>
