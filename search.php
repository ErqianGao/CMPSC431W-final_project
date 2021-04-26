<!DOCTYPE html>
<html>
<head>
    <title>search</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Search for a book!</h1>
<?php
    session_start();
?>

<div class="Container">
    <form class="default_form" autocomplete="off" action="controller.php" method="GET">
        <input type="text" name="name" placeholder="book's name or author's name or ISBN">
        <br>
        <input type="submit" value="Search">
    </form>
    <a href="search_result.php"><button>see the result</button></a>
    <a href="HomePage.php"><button>Back</button></a>
</div>




</body>
</html>