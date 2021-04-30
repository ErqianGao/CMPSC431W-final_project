<!DOCTYPE html>
<html>
<head>
    <title>add_comment</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>add your own comment</h1>

<div class="Container">
    <form class="default_form" autocomplete="off" action="controller.php" method="post">
        <textarea name="short_text" placeholder="your short text comment" rows="5" cols="20" required></textarea>
        <br>
        <input type="hidden" name="isbn" value= " '.$_POST['isbn'].'" >
        <input type="number" name="score" placeholder="score" required>
        <br>
        <input type="submit" value="submit">
    </form>
    <a href="search.php"><button>back</button></a>
    <?php
    if(isset($_SESSION['commentError'])) {
        echo '<br><br>' . $_SESSION['commentError'];
    }
    unset($_SESSION['commentError']);
    ?>
</div>
