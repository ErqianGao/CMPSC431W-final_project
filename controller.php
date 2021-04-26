<?php
session_start ();

require_once 'database_controller.php';

$theDBA = new database_controller();

if (isset ( $_GET ['todo'] ) && $_GET ['todo'] === 'getBooks') {
    if( $_GET['name'] == null )
    {
        $arr = $theDBA->getBooks( $_GET['name'] );
    }
    else
    {
        $arr = $theDBA->getBooks( null );
    }
    echo showBooks($arr);
}


if (isset($_POST['loginUser']) && isset($_POST['loginPassword'])){
    unset($_SESSION['loginError']);
    if ($theDBA->login($_POST['loginUser'],$_POST['loginPassword'])){
        $_SESSION['user']=$_POST['loginUser'];
        header('location:HomePage.php');
    }else{
        $_SESSION['loginError']='The login name or password is incorrect';
        header('location:login.php');
    }
}

if (isset($_POST['registerLoginName']) && isset($_POST['registerPassword'])){
    unset($_SESSION['registrationError']);
    if ($theDBA->checkLoginName($_POST['registerLoginName'])){
        $theDBA->newUser($_POST['registerLoginName'],$_POST['registerPassword']);
        header('location:HomePage.php');
    }else{
        $_SESSION['registrationError']='The login name is taken';
        header('location:register.php');
    }
}

if (isset($_POST['loginManager']) && isset($_POST['loginMPassword'])){
    unset($_SESSION['loginMError']);
    if ($theDBA->loginManager($_POST['loginManager'],$_POST['loginMPassword'])){
        $_SESSION['manager']=$_POST['loginManager'];
        header('location:HomePage.php');
    }else{
        $_SESSION['loginMError']='The login name or password is incorrect';
        header('location:login.php');
    }
}

if (isset($_POST['registerManager']) && isset($_POST['registerMPassword'])){
    unset($_SESSION['registrationMError']);
    if ($theDBA->checkManager($_POST['registerManager'])){
        $theDBA->newManager($_POST['registerManager'],$_POST['registerMPassword']);
        header('location:managerPage.php');
    }else{
        $_SESSION['registrationError']='The username is taken';
        header('location:manager_register.php');
    }
}


if (isset($_POST['update']) &&isset($_POST['ID'])){
    if ($_POST['update']==='increase'){
        $theDBA->increase($_POST['ID']);
    }elseif ($_POST['update']==='decrease'){
        $theDBA->decrease($_POST['ID']);
    }else{
        $theDBA->remove($_POST['ID']);
    }
    header('location:view.php');
}

if (isset($_POST['logout'])){
    session_destroy();
    header('location:HomePage.php');
}


function showBooks($arr){
    $result = '';
    foreach ( $arr as $book ) {
        $result .= '<div class="quotesBox">';
        $result .= '"' . $book ['book'] . '"<br>';
        $result.=' <p class="author">--'.$book['author'].'<br></p>';
        $result.=' <form action="controller.php" method="post">';
        $result.='<input type="hidden" name="ID" value="'.$book['id'].'">';
        $result.='<span id="rating"> '.$book['average_rating'].' </span>';
        $result.='</form></div>';
    }
    return $result;
};
?>