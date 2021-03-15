
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "f1nfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT * FROM Artikel";
$result = $conn->query($sql);

if($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {

        echo "<div class='artikel'>";
        echo "<H3>" . $row["title"]. "</H3>";
        echo "<img src='" . $row["thumbnail"] .  "' loading='lazy'>";
        echo "<br>Text: " . $row["content"];
        echo "</div>";
    }
}
    else{
        echo "0 Results";
    }

?>

