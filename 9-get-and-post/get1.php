<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pengirim GET</h1>
    <?php if(isset($_GET["name"])) :?>
        <h2>
            Hallo <?php echo $_GET["name"] ?>
        </h2>
    <?php endif; ?>

    <form action="get2.php" method="POST">
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

        <button type="submit">Kirim</button>
    </form>
</body>
</html>