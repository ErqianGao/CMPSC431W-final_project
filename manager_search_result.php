<html>
<head>
    <title>manager_search_result</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div>
    <a href="managerSearch.php"><button>new search</button></a>
    <br><br><br><br>
</div>


<?php
include 'controller.php';
    $name = $_GET['name'];
    $database = $_SESSION['database'];
    $arr = $database->getBooks( $name );

    if( count($arr) == 0){
        echo 'no result found!';
    }
    else{
        echo showBooks($arr);
    }

function showBooks($arr) {
    $result = '';
    foreach ( $arr as $book ) {
        $result .= '<div class="commentContainer">';
        $result .= '"' . $book ['title'] . '"<br><br>';
        $result.=' --'.$book['authors'].'<br>';
        $result.=' <form action="detail.php" method="post">';
        $result.=' <input type="hidden" name="isbn" value="'.$book ['isbn'].'" > ';
        $result.=' <button name="check" value="check_detail">check detail and comments</button><br><br><br><br>';
        $result.='</form></div>';
    }
    return $result;
}
?>


</body>
</html>
