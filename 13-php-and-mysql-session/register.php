<?php
    require "functions.php";

    session_start();

    if($_SESSION['login']){
        header("Location: index.php");
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
    <style>
        form {
            margin: 10px;
        }

        div {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <hr>
    <form action="" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password2">Confirm Password:</label>
            <input type="password" name="password2" id="password2" required>
        </div>
        <div>
            <button type="submit" name="submit">Register!</button>
        </div>
    </form>
    <a href="login.php">Login</a>
</body>
</html>