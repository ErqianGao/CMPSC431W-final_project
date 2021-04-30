<html>
<head>
    <title>most popular books</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div>
    <a href="managerPage.php"><button>back</button></a>
    <br><br><br><br>
</div>

<h1>most popular books</h1>

<?php
include 'database_controller.php';
$database = new database_controller();
$arr = $database->searchBySale( true );
echo showBooks($arr);


function showBooks($arr) {
    $result = '';
    foreach ( $arr as $book ) {
        $result .= '<div>';
        $result .= '"' . $book['title'] . '"<br>';
        $result.='authors:    '.$book['authors'].'<br>';
        $result.='isbn:    '.$book['isbn'].'<br>';
        $result.='sales:    '.$book['sale'].'<br>';
        $result.='</div><br><br><br>';
    }
    return $result;
}
?>

