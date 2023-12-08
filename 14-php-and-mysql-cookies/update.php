<?php
require "functions.php";

session_start();

if (!$_SESSION['login']) {
    header("Location: login.php");
}

if (isset($_COOKIE['remember'])) {
    $_SESSION['login'] = true;
}

$id = $_GET['id'];
$name = readRow($id)['name'];
$email = readRow($id)['email'];
$nik = readRow($id)['nik'];
$picture = readRow($id)['picture'];

if (isset($_POST['submit'])) {
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Update User</h1>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <input class="form-control mb-4" type="hidden" name="oldpicture" value="<?= $_GET['oldpicture'] ?>">
            <div>
                <label for="name">Name:</label>
                <input class="form-control mb-4" type="text" name="name" id="name" value="<?= $name ?>" required>
            </div>
            <div>
                <label for="picture">picture:</label>
                <input class="form-control mb-4" type="file" name="picture">
            </div>
            <div>
                <img src="./img/<?= $picture ?>" alt="" width="100">
            </div>
            <div>
                <label for="email">Email:</label>
                <input class="form-control mb-4" type="text" name="email" id="email" value="<?= $email ?>">
            </div>
            <div>
                <label for="nik">NIK:</label>
                <input class="form-control mb-4" type="text" name="nik" id="nik" value="<?= $nik ?>" required>
            </div>
            <div class="mb-4">
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
            <div>
                <a href="index.php">Back to table</a>
            </div>
        </form>
    </div>
</body>

</html>