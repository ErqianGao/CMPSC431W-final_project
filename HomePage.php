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


if (!isset($_SESSION['user'])&&!isset($_SESSION['manager'])){
    echo '<a href="register.php"><button>Register</button></a> ';
    echo '<a href="login.php"><button>Login</button></a>';
    echo '<a href="managerLogin.php"><button>I am a manager</button></a>';
}
elseif(isset($_SESSION['user'])&&!isset($_SESSION['manager'])){
    echo '<a href="search.php"><button>search for a book</button></a> ';
    echo '<form class="default_form" action="controller.php" method="post"><button name="logout" value="logout">Logout</button></form>';
    echo '<i><b> Hello '.$_SESSION['user'].'!</i></b>';
}
else{
    echo '<a href="managerPage.php"><button>go to manager page</button></a>';
    echo '<form class="default_form" action="controller.php" method="post"><button name="logout" value="logout">Logout</button></form>';
    echo '<i><b> Hello '.$_SESSION['manager'].'!</i></b>';
}

?>
</body>
</html>