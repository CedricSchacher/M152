
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>F1nfo</title>
</head>
<body>
<?php
 if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~', $_SERVER['HTTP_USER_AGENT'])) {
        echo "<h1>This website does not support Internet Explorer. It's time to move on and install a newer browser.</h1>";
        echo "<p><a href=\"https://www.google.com/chrome/\">Get Google Chrome</a></p>";
        echo "<p><a href=\"https://www.mozilla.org/firefox/new/\">Get Mozilla Firefox</a></p>";
        die;
    }
?>
<div id="logo">
    <picture>
        <img src="F1nfos.webp" width="100" loading="lazy">
    </picture>
</div>
<h1>Formel 1 News und Infos</h1>

    <?php require_once "selectAllArtikel.php"; ?>
<div id="bottom">
<button><a href="hochladen.php">Neuer Artikel</a></button>
</div>

</body>
</html>