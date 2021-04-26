<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
session_start();
?>

<h3>Login</h3>

<div class="Container">
    <form class="default_form" autocomplete="off" action="controller.php" method="post">
        <input type="text" name="loginUser" placeholder='your login name' required>
        <br>
        <input type="password" name="loginPassword" placeholder='your password' required>
        <br><br>
        <input type="submit" value="Login">
    </form>
    <a href="HomePage.php"><button>Back</button></a>
    <?php
    if(isset($_SESSION ['loginMError']))
        echo '<br><br>'.$_SESSION ['loginMError'];
    unset($_SESSION ['loginMError']);
    ?>
</div>

</body>
</html>