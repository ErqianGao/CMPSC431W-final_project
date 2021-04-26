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

<h3>Manager Register</h3>
<div class="Container">
    <form class="dform" autocomplete="off"  action="controller.php" method="post">
        <input type="text" name="registerManager" placeholder='login name' required>
        <br>
        <input type="password" name="registerMPassword" placeholder='password' required>
        <br><br>
        <input type="submit" value="Register">
    </form>
    <a href="managerPage.php"><button>Back</button></a>
    <?php
    if( isset($_SESSION ['registrationMError']))
        echo '<br><br>'.$_SESSION ['registrationMError'];
    unset($_SESSION ['registrationMError']);
    ?>

</div>
</body>
</html>