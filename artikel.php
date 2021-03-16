
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="commentStyle.css">
    <title>F1nfo</title>
</head>
<body>
<div id="logo">
    <picture>
    <img src="F1nfos.webp" width="100" loading="lazy">
    </picture>
</div>
<?php require_once "selectSpecificArtikel.php"; ?>

<div id="kommentar">
    <?php require_once "selectSpecificComments.php"; ?>
</div>
<div id="neuKommentar">
    <h3>Neuer Kommentar</h3>
    <form enctype="multipart/form-data" method="POST">
    <input type="text" name="name" placeholder="Name" id="textName">
    <input type="text" name="kommentar" placeholder="Comment" id="textComment">
    <input type="submit" name="submitbutton" id="submitButton">
    </form>
</div>
<?php
require_once "createComment.php";
if (isset($_POST["submitbutton"])) {
    $creationResult = createComment::getInstance()->commentErstellen();
}
?>
</body>
</html>
