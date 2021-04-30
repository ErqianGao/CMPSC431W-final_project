<!DOCTYPE html>
<html>
<head>
    <title>manager_detail</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div>
    <a href="search_result.php"><button>back</button></a>
    <br><br><br><br>
</div>

<?php
include 'controller.php';
$database = new database_controller();
$arr = $database->getBookByISBN( $_POST['isbn']);
echo(showDetail($arr));
echo( '<br><br><br><br><br>' );

?>


<div>
    <form class="default_form" autocomplete="off" action="managerDetail.php" method="POST">
        <input type="number" name="number" placeholder="stock right now" required>
        <input type="hidden" name="isbn" value="<?php echo $_POST['isbn'] ?>">
        <br>
        <input type="submit" value="order">
    </form>

    <a href="HomePage.php"><button>Back</button></a><br><br>
</div>


<?php

if (isset($_POST['number'])) {
    $database->update_stock( $_POST['isbn'], $_POST['number']);
    header('location:HomePage.php');
}


function showDetail($arr) {
    $result = '';
    foreach ( $arr as $book ) {
        $result .= '<div>';
        $result .= '"' . $book['title'] . '"<br>';
        $result.='authors:    '.$book['authors'].'<br>';
        $result.='isbn:    '.$book['isbn'].'<br>';
        $result.='current stock:    '.$book['stock'].'<br>';
        $result.='</div>';
    }
    return $result;
}




?>

</body>
</html>