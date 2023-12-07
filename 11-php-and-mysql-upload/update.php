<?php
    require "functions.php";
    
    $id = $_GET['id'];
    $name = readRow($id)['name'];
    $email = readRow($id)['email'];
    $nik = readRow($id)['nik'];
    $picture = readRow($id)['picture'];

    if(isset($_POST['submit'])){
        update();
        var_dump($_FILES);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Update User</h1>
    <hr>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="oldpicture" value="<?= $_GET['oldpicture'] ?>">    
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $name ?>" required>
        </div>
        <div>
            <label for="picture">picture:</label>
            <input type="file" name="picture">
        </div>
        <div>
            <img src="./img/<?= $picture ?>" alt="" width="100">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?= $email ?>">
        </div>
        <div>
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" value="<?= $nik ?>" required>
        </div>
        <div>
            <button type="submit" name="submit">Update</button>
        </div>
        <div>
            <a href="index.php">Back to table</a>
        </div>
    </form>
</body>
</html>