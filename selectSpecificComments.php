
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


$sql = "SELECT * FROM kommentar WHERE ArtikelID = $id";
$result = $conn->query($sql);

if($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        echo "<div class='artikel'>";
        echo " " . $row["content"]. "<br><div class='nameDate'>" . $row["datum"] ." " .  $row["name"] .  "</div>";
        echo "</div>";
    }
}
else{
    echo "0 Results";
}

?>

