<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get submitted username and password
    $submittedUsername = $_POST["username"];
    $submittedPassword = $_POST["password"];
    // Retrieve user information from the database
    $sql = "SELECT * from user where username='$submittedUsername' ";
    $result=$conn->query($sql) ;
    if ($result->num_rows>0){
        echo"username is already taken";
        
    }
    else{
        $sql = "insert into user(username,password) values('$submittedUsername','$submittedPassword')";
        $result= $conn->query($sql);
        if($result){
         echo "sign up successful";
         header("location:index.php");
         
        }
        else("not successful");
     }
    }

    
   

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


        
    
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">Wallet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto"> <!-- ml-auto for right alignment -->
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
           
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Sign up</div>
                <div class="card-body">
                    <form method="post" action="signup.php">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php
$conn-> close();
?>
</html>
