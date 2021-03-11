
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>F1nfo</title>
</head>
<body>
<div id="logo">

</div>
<?php require_once "selectSpecificArtikel.php"; ?>

<div id="kommentar">
    <?php require_once "selectSpecificComments.php"; ?>
</div>
<div id="neuKommentar">
    <input type="text" id="name">
    <input type="text" id="kommentar">
</div>

</body>
</html>
