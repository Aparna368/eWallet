<?php

require('connect.php');
session_start();
if(!isset($_SESSION['user_id']))
{
header("location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id=$_SESSION["user_id"];
    $amount=$_POST["amount"];
    $date=$_POST["date"];
    $note=$_POST["note"];
    $type=$_POST["type"];
    $sql = "INSERT  into transaction(user_id,date,amount,note,type)  values($user_id,'$date',$amount,'$note','$type')" ;
    $result=$conn->query($sql) ;
    if($result){
      echo'<div class="alert alert-success" role="alert">
      Transaction is successfully added.
    </div>' ;
    }
    else {
        echo" no";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Form</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

</head>
    <?php
require('nav.php');?>
<div class="container">
    <h1>Transaction Form</h1>

    <form method="post">
        <!-- Type (Earn/Spend) -->
        <div class="form-group">
            
            <select class="form-control" id="type" name="type">
                <option value="earn">Earn</option>
                <option value="spend">Spend</option>
            </select>
        </div>

        <!-- Date -->
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="datetime-local" class="form-control" id="date" name="date">
        </div>

        <!-- Amount -->
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" >
        </div>

        <!-- Note -->

        <div class="form-group">
            <label for="note">Note:</label>
            <textarea class="form-control" id="note" name="note" rows="4"></textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Add transaction</button>
    </form>



<!-- Add Bootstrap and other JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
$conn-> close();
?>
</html>
