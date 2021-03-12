<?php



class createArtikel
{
    private static $instance;
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new createArtikel();
        }
        return self::$instance;
    }
    function postErstellen()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "f1nfo";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            echo "connection erfolgreich";
        }

        if (!isset($_POST["title"]) || empty($_POST["title"])) {
            echo "You must specify a title.";
        }
        $title = $_POST["title"];

        if (strlen($title) > 500) {
            echo "The title is too long.";
        }

        if (!isset($_POST["text"]) || empty($_POST["text"])) {
            echo "You must put Text";
        }

        //Validate the license selection.
        $allowedLicenses = array("all-rights-reserved", "cc0", "cc-by", "cc-by-sa", "cc-by-nc", "cc-by-nc-sa", "cc-by-nd", "cc-by-nc-nd");
        if (!isset($_POST["license"]) || !in_array($_POST["license"], $allowedLicenses)) {
            echo "Please select a license.";
        }
        $license = $_POST["license"];

        //Validate and upload the image file.
        if (!isset($_FILES["image"])) {
            echo "You must upload an image file.";
        }

        $tempPath = $_FILES["image"]["tmp_name"];
        if ($_FILES["image"]["size"] > 2000000000) { //2 MB
            echo "The uploaded file is too big.";
        }
        $text = $_POST["text"];

        //Check the file type.
        $allowedTypes = array("image/png", "image/webp");
        $fileInfo = new finfo();
        $mimeType = $fileInfo->file($tempPath, FILEINFO_MIME_TYPE);
        if (!in_array($mimeType, $allowedTypes)) {
            echo "The file must either be a PNG or a WebP file.";
        }

        //Make sure the upload directory exists.
        $uploadDirectory = "posts" . DIRECTORY_SEPARATOR . date("Y-m-d");
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $destinationFilePath = $uploadDirectory . DIRECTORY_SEPARATOR . microtime() . "." . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        //Move the uploaded image to the destination directory.
        if (!move_uploaded_file($tempPath, $destinationFilePath)) {
            echo "An error occurred while saving the image. Please try again later.";
        }

        $imagePath = $destinationFilePath;
        //Determine the original image size.
        $imageData = getimagesize($imagePath);
        $width = $imageData[0];
        $height = $imageData[1];
        $imageType = $imageData[2];

        if ($width <= 128) {
            $thumbnailPath = $imagePath;
        }

        $image = null;
        if ($imageType == IMAGETYPE_PNG) {
            $image = imagecreatefrompng($imagePath);
        } else if ($imageType == IMAGETYPE_WEBP) {
            $image = imagecreatefromwebp($imagePath);
        } else {
            return $imagePath;
        }

        $image = imagescale($image, 128);

        $pathInfo = pathinfo($imagePath);
        $thumbnailPath = $pathInfo["dirname"] . DIRECTORY_SEPARATOR . $pathInfo["filename"] . " (Thumbnail)." . $pathInfo["extension"];

        if ($imageType == IMAGETYPE_PNG) {
            imagepng($image, $thumbnailPath);
        } else if ($imageType == IMAGETYPE_WEBP) {
            imagewebp($image, $thumbnailPath, 100);
        }
        echo $title, "<br>", $text, "<br>", $destinationFilePath, "<br>", $thumbnailPath, "<br>", $license;


        //ALL BUT THIS WORKS GRRRRRRR :(
        $result = $conn->query("INSERT INTO 'artikel'(title, content, picture, thumbnail, copyright) VALUES($title, $text, $destinationFilePath, $thumbnailPath, $license)");
        if ($result) {
            echo "Bild erfolgreich hochgeladen";
        }
        else{
            echo "something wrong";
        }

    }
}
