<?php
$db_host = "sql204.infinityfree.com"; // e.g., "localhost"
$db_user = "if0_35503372";
$db_pass = "TnBx7uKPolxZ";
$db_name = "if0_35503372_wallet"; // Use the name of your database

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>