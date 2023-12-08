<?php
    require "functions.php";

    session_start();

    if(isset($_SESSION['login'])){
        header("Location: index.php");
    }

    if(isset($_COOKIE['remember'])){
        $_SESSION['login'] = true;
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $nik = $_POST['nik'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // Konfirmasi Password:
        if($password === $password2){
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT id FROM employees WHERE email = '$email'");
            $row = mysqli_fetch_assoc($result);

            // Cek apakah email terdaftar?
            if(mysqli_affected_rows($conn)){
                echo "
                    <script>
                        alert('Email registered!');
                    </script>
                ";
            } else {
                mysqli_query($conn, "INSERT INTO employees VALUES('', '$name', '$email', '$nik', NULL, '$hashedPassword')");
                if(mysqli_affected_rows($conn)){
                    header("Location: login.php");
                } else {
                    echo "
                        <script>
                            alert('Something went wrong!');
                        </script>
                    ";
                }
            }
            
        } else {
            echo "
                <script>
                    alert('Password unmatched');
                </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <h1>Register</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-4">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="password2">Confirm Password:</label>
            <input type="password" name="password2" id="password2" class="form-control" required>
        </div>
        <div class="mb-4">
            <button type="submit" name="submit" class="btn btn-primary">Register!</button>
        </div>
    </form>
    <a href="login.php">Login</a>
</div>

</body>
</html>