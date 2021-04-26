<?php
class database_controller
{
    private $DB;

    public function __construct()
    {
        $servername = 'localhost';
        $dbname = "project1_erqiangao";
        $user = 'root';
        $password = '';
        try {
            $this->DB = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $user, $password);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo ("connect successfully!");
        } catch (PDOException $e) {
            echo('Error establishing Connection');
            exit ();
        }
    }

    function __destruct(){
        $conn = NULL;
    }

    public function getBooks( $name ){
        if( $name == null ){
            $stmt = $this->DB->prepare("SELECT * FROM books");
            $stmt->execture();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $stmt = $this->DB->prepare("SELECT * FROM books WHERE (title LIKE '%$name%') OR (authors LIKE '%$name%') OR (isbn LIKE '%$name%')");
            $stmt->execute();
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
    }

    public function newComment( $login_name, $isbn, $text ){
        $stmt = $this->DB->prepare("INSERT INTO comments(login_name,isbn,text) VALUES ('$login_name', '$isbn', '$text')");
        $stmt->execute();
    }

    public function getComment( $isbn ){
        $stmt = $this->DB->prepare("SELECT * FROM comments WHERE isbn = '$isbn'");
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function createNewManager( $name, $password ){
        $stmt = $this->DB->prepare( "INSERT INTO managers(login_name, password) VALUES ('$name', '$password')" );
        $stmt->execute();
    }

    public function login($login_name, $password){
        $stmt= $this->DB->prepare( "SELECT login_name, password FROM users WHERE login_name='".$login_name."'AND password='".$password."';");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array)===0){
            return false;
        }else{
            return true;
        }
    }
}

?>