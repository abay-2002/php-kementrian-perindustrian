<?php    
    require "functions.php";
    
    session_start();

    if(!$_SESSION['login']){
        header("Location: login.php");
    }

    if(isset($_COOKIE['remember'])){
        $_SESSION['login'] = true;
    }
    
    create();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">

    <h1>Create New User</h1>
    <hr>
    <form action="" method="POST">
        <div class="mb-4">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="mb-4">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="mb-4">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="mb-4">
            <label for="nik">NIK:</label>
            <input class="form-control" type="text" name="nik" id="nik" required>
        </div>
        <div class="mb-4">
            <button class="btn btn-primary" type="submit" name="submit">Create</button>
        </div>
        <div class="mb-4">
            <a href="index.php">Back to table</a>
        </div>
    </form>
    </div>

</body>
</html>