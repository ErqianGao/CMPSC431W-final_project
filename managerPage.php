<!DOCTYPE html>
<html>
<head>
    <title>homepage</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Welcome to the manager page!</h1>
<?php
session_start();

if (!isset($_SESSION['manager'])){
    echo('you have not login yet');
    echo '<a href="managerLogin.php"><button>back</button></a>';
}
else{
    echo '<a href="manager_register.php"><button>register a new manager</button></a>';
    echo '<a href="addBook.php"><button>add a new book</button></a>';
    echo '<a href="managerSearch.php"><button>change stock level</button></a>';
    echo '<a href="mostPop.php"><button>most popular books</button></a>';
    echo '<a href="leastPop.php"><button>least popular books</button></a>';
    echo '<a href="HomePage.php"><button>Back</button></a>';
}

?>
</body>
</html>
