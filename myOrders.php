<!DOCTYPE html>
<html>
<head>
    <title>orders</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div>
    <a href="HomePage.php"><button>back</button></a>
    <br><br><br><br>
</div>


<?php
include 'controller.php';
$database = new database_controller();
$arr = $database->getorders( $_SESSION['user'] );

echo( 'your orders' );
echo( '<br><br>' );

if( count($arr) == 0){
    echo 'no orders found!';
}
else{
    echo showOrders($arr);
}

function showOrders($arr) {
    $result = '';
    foreach ( $arr as $order ) {
        $result.='title: '.$order ['title'].'<br>';
        $result.='isbn: '.$order ['ISBN'].'<br>';
        $result.='copies: '.$order ['copies'].'<br> ';
        $result.='<br><br>';
        $result.='</form></div>';
    }
    return $result;
}
?>


</body>
</html>
