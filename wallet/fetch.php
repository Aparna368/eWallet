<?php
session_start();
if(!isset($_SESSION['user_id']))
{
header("location:login.php");
}
$startDate=$_GET['start_date'];
$endDate=$_GET['end_date'];
$nextDate = date('Y-m-d', strtotime($endDate . ' + 1 day'));
$user_id=$_SESSION['user_id'];
require('connect.php');
$sql="SELECT * from transaction where user_id=$user_id and date<='$nextDate' and date>='$startDate' ";
// $conn->query($sql);
$result=$conn-> query($sql);
$data=array();
while($row=$result->fetch_assoc()){
    array_push($data, $row);
}
echo json_encode($data);
// print_r($data);
// echo $sql;
?>