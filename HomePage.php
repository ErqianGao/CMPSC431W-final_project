<!DOCTYPE html>
<html>
<head>
    <title>homepage</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Welcome to Book Store!</h1>
<?php
session_start();

if (!isset($_SESSION['user'])){
    echo '<a href="register.php"><button>Register</button></a> ';
    echo '<a href="login.php"><button>Login</button></a>';
}else{
    echo '<a href="searchBook"><button>search for a book</button></a> ';
    echo '<form class="dform" action="controller.php" method="post"><button name="logout" value="logout">Logout</button></form>';
    echo '<i><b> Hello '.$_SESSION['user'].'!</i></b>';
}

?>
</body>
</html>