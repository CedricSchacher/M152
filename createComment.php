<?php



class createComment
{
    private static $instance;
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new createComment();
        }
        return self::$instance;
    }
    function commentErstellen()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "f1nfo";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (!isset($_POST["name"]) || empty($_POST["name"])) {
            echo "You must write a name";
        }
        $name = $_POST["name"];


        if (!isset($_POST["kommentar"]) || empty($_POST["kommentar"])) {
            echo "You must put Text";
        }
        $comment = $_POST["kommentar"];

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $date = date("Y-m-d");




        $result = $conn->query("INSERT INTO kommentar(artikelID, name, datum, content) VALUES('$id', '$name', '$date', '$comment')");
        if ($result) {
            echo "Kommentar hinzugefügt";
        }
        else{
            echo "something wrong";
        }

    }
}

