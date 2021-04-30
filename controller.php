<?php
session_start ();

include 'database_controller.php';

$theDBA = new database_controller();

$_SESSION['database'] = $theDBA;


if (isset($_POST['score'])){
    unset($_SESSION['commentError']);
    if ( $theDBA->checkComment( $_SESSION['user'], $_POST['isbn'] )){
        $theDBA->newComment( $_SESSION['user'], $_POST['isbn'] ,$_POST['score'], $_POST['short_text'] );
        header('location:search.php');
    }
    else{
        $_SESSION['commentError'] = 'you already have comment on this book';
        header('location:addComment.php');
    }
}


if (isset($_POST['update']) &&isset($_POST['isbn'])){
    if ($_POST['update']==='increase'){
        $theDBA->increase($_POST['login_name'], $_POST['isbn']);
    }elseif ($_POST['update']==='decrease'){
        $theDBA->decrease($_POST['login_name'], $_POST['isbn']);
    }

    header('location:search.php');
}


if(isset($_POST['title']) ){
    unset($_SESSION['addBookError']);
    if($theDBA->checkBook($_POST['title'],$_POST['isbn'],$_POST['isbn_13'])) {
        $theDBA->newBook($_POST['title'], $_POST['authors'], $_POST['isbn'], $_POST['isbn_13'], $_POST['language_code'], $_POST['publication_date'], $_POST['publisher']);
        header('location:managerPage.php');
    }
    else{
        $_SESSION['addBookError'] = 'the book already exists';
        header('location:addBook.php');
    }
}

if (isset($_POST['loginUser']) && isset($_POST['loginPassword'])){
    unset($_SESSION['loginError']);
    if ($theDBA->checkPassword($_POST['loginUser'],$_POST['loginPassword'])){
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



if (isset($_POST['logout'])){
    session_destroy();
    header('location:HomePage.php');
}

if( isset($_GET['todo']) && $_GET['todo'] == 'getComments'){
    $r = $theDBA->checkCommentsExist($_GET['isbn']);
    if( $r == false ) {
        echo('no comments yet');
    }
    else{
        $comments = $theDBA->getComments($_GET['isbn']);
        echo(showComments($comments));
    }
}


?>