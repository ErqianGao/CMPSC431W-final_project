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
    <form class="default_form" autocomplete="off" action="manager_search_result.php" method="GET">
        <textarea name="name" placeholder="book's name or author's name or ISBN" rows="5" cols="20" required></textarea>
        <br>
        <input type="submit" value="Search">
    </form>
    <a href="HomePage.php"><button>Back</button></a>
</div>

<div id="books"></div>








</body>
</html>