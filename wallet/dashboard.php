<?php
session_start();
if(!isset($_SESSION['user_id']))
{
header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add your custom CSS here if needed -->
    <style>
        /* Your custom CSS styles can go here */
    </style>
</head>
<body>
    
    
<style>
    /* Your custom CSS styles can go here */
    body {
        background: url('bg.jpg') no-repeat center center fixed;
        background-size: cover;
    }
</style>

<?php
require('nav.php');?>

<!-- Add Bootstrap and other JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your custom JavaScript
