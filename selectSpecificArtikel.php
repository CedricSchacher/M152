
<?php
$id = 1;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "f1nfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Artikel WHERE ID = $id";
$result = $conn->query($sql);

if($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        echo "<div id='title'><h1>" . $row["title"] . "</h1></div>";
        echo "<div class='artikel'>";
        echo "<figure>";
        echo "<img src='" . $row["picture"] .  "' loading='lazy'>";
        echo "<figcaption>Copyright: " . $row["copyright"] . "</figcaption> </figure>";
        echo "<div id='content'>" . $row["content"] . "</div>";

        echo "</div>";
    }
}
else{
    echo "0 Results";
}

?>

