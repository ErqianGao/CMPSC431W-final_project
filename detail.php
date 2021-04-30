<!DOCTYPE html>
<html>
<head>
    <title>book_detail</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div>
    <a href="search.php"><button>new search</button></a>
    <br><br><br><br>
</div>

<?php
include 'controller.php';
    $database = $_SESSION['database'];
    $arr = $database->getBookByISBN( $_POST['isbn']);
    echo(showDetail($arr));
    echo( '<br><br><br><br><br>' );
    $isbn = $_POST['isbn'];
?>

<div>
    <a href="addComment.php"><button>add your own comment</button></a>
</div>


<?php

    echo( 'comments:' );
    echo( '<br><br>' );

    $r = $database->checkCommentsExist($_POST['isbn']);
    if( $r == false ) {
        echo('no comments yet');
    }
    else{
        $comments = $database->getComments($_POST['isbn']);
        echo(showComments($comments));
    }


function showComments($arr) {
    $result = '';
    foreach ( $arr as $comment ) {
        $result .= '<div class="quotesBox">';
        $result .= '"' . $comment ['short_text'] . '"<br>';
        $result.=' <p class="author">--'.$comment ['login_name'].'<br></p>';
        $result.=' <form action="controller.php" method="post">';
        $result.=' <input type="hidden" name="login_name" value="'.$comment['login_name'].'">';
        $result.=' <input type="hidden" name="isbn" value="'.$comment['isbn'].'">';
        $result.=' <button name="update" value="increase">+</button>';
        $result.='<span id="usfulness_score"> '.$comment ['usefulness_score'].' </span>';
        $result.='<button name="update" value="decrease">-</button> ';
        $result.='</form></div>';
    }
    return $result;
}

function showDetail($arr) {
    $result = '';
    foreach ( $arr as $book ) {
        $result .= '<div>';
        $result .= '"' . $book['title'] . '"<br>';
        $result.='authors:    '.$book['authors'].'<br>';
        $result.='isbn:    '.$book['isbn'].'<br>';
        if( isset($book['isbn_13']) ) {
            $result .= 'isbn_13:    ' . $book['isbn_13'] . '<br>';
        }
        $result.='language:    '.$book['language_code'].'<br>';
        if( isset($book['num_pages']) ) {
            $result .= 'number of pages:    ' . $book['num_pages'] . '<br>';
        }
        $result.='publication date:   '.$book['publication_date'].'<br>';
        $result.='publisher:    '.$book['publisher'].'<br>';
        $result.='</div>';
    }
    return $result;
}
?>

</body>
</html>