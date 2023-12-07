<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengirim POST</title>
</head>
<body>
    <h1>Pengirim POST</h1>
    <hr>
    <?php if(isset($_POST["name"])) :?>
        <h2>Hallo <?= $_POST["name"]?></h2>
    <?php endif;?>

    <form action="post2.php" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" required>
        </div>
        <div>
            <label for="nik">NIK:</label>
            <input type="text" name="nik" required>
        </div>
        <div>
            <button type="submit">Kirim</button>
        </div>
    </form>
</body>

</html>