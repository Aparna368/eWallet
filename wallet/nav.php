<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">Wallet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto"> <!-- ml-auto for right alignment -->
           
            
            <li class="nav-item">
                <a class="nav-link" href="form.php">Add transaction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recent.php">Recent transactions</a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign up</a>
            </li>
            <li class="nav-item">
                <form method="post" action="logout.php" >
                <button class="btn btn-danger btn-sm m-1" type="submit">Log out</button></form>
            </li>
        </ul>
    </div>
</nav>