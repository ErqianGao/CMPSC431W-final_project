<!DOCTYPE html>
<html>
<head>
    <title>search_result</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Search result</h1>
<?php
session_start();
?>

<div id="books"></div>
<script>
    var element = document.getElementById("books");
    function showQuotes() {
        var ajax= new XMLHttpRequest();
        ajax.open('GET','controller.php?todo=getBooks',true);
        ajax.onreadystatechange=function(){
            if (ajax.readyState===4 && ajax.status===200){
                document.getElementById('books').innerHTML=ajax.responseText;
            }
        }
    }
</script>

<?php
