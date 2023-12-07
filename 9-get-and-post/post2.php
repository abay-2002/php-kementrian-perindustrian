<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerima POST</title>
</head>
<body>
    <h1>Penerima POST</h1>
    <hr>
    <?php if(isset($_POST["name"])) :?>
        <h2>Hallo <?= $_POST["name"]?></h2>
        <h2><?= $_POST["email"]?></h2>
        <h2><?= $_POST["nik"]?></h2>
    <?php endif;?>
</body>
</html>