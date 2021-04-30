<!DOCTYPE html>
<html>
<head>
    <title>addBook</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
session_start();
?>

<h3>Add a new book</h3>
<div class="Container">
    <form class="dform" autocomplete="off"  action="controller.php" method="post">
        <input type="text" name="title" placeholder='title' required>
        <br>
        <input type="text" name="authors" placeholder='authors' required>
        <br>
        <input type="text" name="isbn" placeholder='isbn' required>
        <br>
        <input type="text" name="isbn_13" placeholder='isbn_13' required>
        <br>
        <input type="text" name="language_code" placeholder='language_code' required>
        <br>
        <input type="text" name="publication_date" placeholder='publication_date' required>
        <br>
        <input type="text" name="publisher" placeholder='publisher' required>
        <br>
        <input type="text" name="publisher" placeholder='publisher' required>
        <br><br>
        <input type="submit" value="Add">
    </form>
    <a href="managerPage.php"><button>Back</button></a>
    <?php
    if( isset($_SESSION ['addBookError']))
        echo '<br><br>'.$_SESSION ['addBookError'];
    unset($_SESSION ['addBookError']);
    ?>

</div>
</body>
</html>