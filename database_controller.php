<?php
class database_controller
{
    private $DB;

    public function __construct()
    {
        $servername = 'localhost';
        $dbname = "project_erqiangao";
        $user = 'root';
        $password = '';
        try {
            $this->DB = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo('Error establishing Connection');
            exit ();
        }
    }

    function __destruct(){
        $conn = NULL;
    }

    /**public function test(){
        $stmt = $this->DB->prepare("SELECT * FROM books LIMIT 1000");
        $stmt->execture();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/

    public function getBooks( $name ){
        $stmt = $this->DB->prepare("SELECT * FROM books WHERE ( UPPER(title) LIKE UPPER('%$name%') ) OR ( UPPER(authors) LIKE UPPER('%$name%') ) OR (isbn LIKE '%$name%') LIMIT 1000");
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getBookByISBN( $isbn ){
        $stmt = $this->DB->prepare("SELECT * FROM books WHERE isbn = '$isbn' ");
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function increase( $login_name, $isbn ){
        $stmt = $this->DB->prepare("UPDATE comments SET usefulness_score = usefulness_score + 1 WHERE login_name = '$login_name' AND isbn = '$isbn' ");
        $stmt->execute();
        $_POST['isbn'] = $isbn;
    }

    public function decrease( $login_name, $isbn ){
        $stmt = $this->DB->prepare("UPDATE comments SET usefulness_score = usefulness_score - 1 WHERE login_name = '$login_name' AND isbn = '$isbn' ");
        $stmt->execute();
        $_POST['isbn'] = $isbn;
    }

    public function newComment( $login_name, $isbn, $score, $text ){
        $stmt = $this->DB->prepare("INSERT INTO comments(isbn,login_name, usefulness_score, score, short_text) VALUES ('$isbn', '$login_name', '$score', 0 '$text')");
        $stmt->execute();
    }

    public function getComments( $isbn ){
        $stmt = $this->DB->prepare("SELECT * FROM comments WHERE isbn = '$isbn' ORDER BY usefulness_score");
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function checkComment($isbn, $login_name ){
        $stmt = $this->DB->prepare("SELECT * FROM comments WHERE isbn = '$isbn' AND login_name = '$login_name' ");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if( count($array) == 0 ){
            return true;
        }
        else{
            return false;
        }
    }


    public function checkCommentsExist($isbn ){
        $stmt = $this->DB->prepare("SELECT * FROM comments WHERE isbn = '$isbn'");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if( count($array) == 0 ){
            return false;
        }
        else{
            return true;
        }
    }

    public function checkBook( $title, $isbn, $isbn_13){
        $stmt = $this->DB->prepare( "SELECT * FROM books WHERE title = '$title' AND isbn = '$isbn' AND isbn13 = '$isbn_13' ");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($array) ===0){
            return true;
        }else{
            return false;
        }
    }

    public function newBook( $title, $author, $isbn, $isbn_13, $language_code, $publication_date, $publisher ){
        $stmt = $this->DB->prepare( "INSERT INTO books(title, authors, isbn, isbn13, language_code, publication_date, publisher) VALUES ('$title', '$author', '$isbn', '$isbn_13', '$language_code', '$publication_date', '$publisher' )" );
        $stmt->execute();
    }
    public function newManager( $login_name, $password ){
        $stmt = $this->DB->prepare( "INSERT INTO managers(login_name, password) VALUES ('$login_name', '$password')" );
        $stmt->execute();
    }

    public function checkLoginName($login_name){
        $stmt = $this->DB->prepare("SELECT * FROM users where login_name = '$login_name'");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($array) === 0){
            return true;
        }else{
            return false;
        }
    }

    public function checkManager($login_name){
        $stmt = $this->DB->prepare("SELECT * FROM managers where login_name = '$login_name'");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($array) == 0){
            return true;
        }else{
            return false;
        }
    }
    public function checkPassword($login_name, $password){
        $stmt= $this->DB->prepare( "SELECT login_name, password FROM users WHERE login_name='$login_name'AND password='$password'");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array)==0){
            return false;
        }else{
            return true;
        }
    }

    public function loginManager($login_name, $password){
        $stmt= $this->DB->prepare( "SELECT login_name, password FROM managers WHERE login_name='$login_name'AND password='$password'");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array)===0){
            return false;
        }else{
            return true;
        }
    }

    public function newUser($login_name, $password){
        $stmt = $this->DB->prepare( "INSERT INTO users(login_name, password) VALUES ('$login_name', '$password')");
        $stmt->execute();
    }
}

?>