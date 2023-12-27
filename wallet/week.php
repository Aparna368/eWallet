<?php
session_start();
if(!isset($_SESSION['user_id']))
{
header("location:login.php");
}
require('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Checker</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    require('nav.php');
    ?>

</head>
<div class="container mt-5">
    <h2>Data Checker</h2>
    
    <!-- Date Selection -->
    <form method="post" action="">
        <div class="form-group">
            <label for="selectedDate">Select a Date:</label>
            <input type="date" class="form-control" name="selectedDate" required>
        </div>

        <!-- Button to Check Data -->
        <button type="submit" class="btn btn-primary" name="checkData">Check Data</button>
    </form>

    <!-- Display Results -->
    <div class="mt-3" id="result">
        <?php
        // Check if form is submitted
        if (isset($_POST['checkData'])) {
            // Get the selected date from the form
            $selectedDate = new DateTime($_POST['selectedDate']);

            // Get the current date
            $currentDate = new DateTime();

            // Check if the selected date is within the current week
            $isWithinWeek = $selectedDate >= new DateTime($currentDate->format('Y-m-d')) &&
                            $selectedDate <= new DateTime($currentDate->format('Y-m-d').' +6 days');

            // Check if the selected date is within the current month
            $isWithinMonth = $selectedDate->format('Y-m') == $currentDate->format('Y-m');

            // Display results
            if ($isWithinWeek) {
                echo "Selected date is within the current week.";
            } elseif ($isWithinMonth) {
                echo "Selected date is within the current month.";
            } else {
                echo "Selected date is not within the current week or month.";
            }
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS and jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
