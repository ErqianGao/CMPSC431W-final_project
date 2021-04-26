<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
session_start();
?>

<h3>Register</h3>
<div class="Container">
    <form class="dform" autocomplete="off"  action="controller.php" method="post">
        <input type="text" name="registerLoginName" placeholder='login name' required>
        <br>
        <input type="password" name="registerPassword" placeholder='password' required>
        <br><br>
        <input type="submit" value="Register">
    </form>
    <a href="HomePage.php"><button>Back</button></a>
    <?php
    if( isset($_SESSION ['registrationError']))
        echo '<br><br>'.$_SESSION ['registrationError'];
    unset($_SESSION ['registrationError']);
    ?>

</div>
</body>
</html>