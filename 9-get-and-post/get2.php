<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Menerima GET</h1>
    <hr>
    <?php if(isset($_GET["name"])) :?>
        <h2>Selamat Datang <?= $_GET["name"] ?></h2>
    <?php endif; ?>

</body>
</html>