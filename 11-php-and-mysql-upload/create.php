<?php
    require "functions.php";
    create();
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
    <h1>Create New User</h1>
    <hr>
    <form action="" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div>
            <button type="submit" name="submit">Create</button>
        </div>
        <div>
            <a href="index.php">Back to table</a>
        </div>
    </form>
</body>
</html>