
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="uploadStyle.css">
    <title>F1nfo</title>
</head>
<body>
<div id="logo">

</div>
<div id="hochladen">
<form enctype="multipart/form-data" method="POST">

<input type="text" placeholder="Titel" name="title" id="title">


<select name="license" id="license">
    <option value="all-rights-reserved" selected>All rights reserved</option>
    <option value="cc-by-nc-nd">CC BY-NC-ND</option>
    <option value="cc-by-nd">CC BY-ND</option>
    <option value="cc-by-nc-sa">CC BY-NC-SA</option>
    <option value="cc-by-nc">CC BY-NC</option>
    <option value="cc-by-sa">CC BY-SA</option>
    <option value="cc-by">CC BY</option>
    <option value="cc0">CC0 / Public Domain</option>
</select>

<input type="hidden" name="MAX_FILE_SIZE" value="2000000000">

<input type="file" name="image" id="upload">


<input type="textarea" placeholder="Text" name="text" id="text" >


<input type="submit" name="submitbutton" id="submit">

</form>
</div>
<?php
require_once "createArtikel.php";
if (isset($_POST["submitbutton"])) {
    $creationResult = createArtikel::getInstance()->postErstellen();
}
?>

</body>
</html>
