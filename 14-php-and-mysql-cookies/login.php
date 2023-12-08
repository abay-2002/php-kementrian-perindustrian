<?php
    require "functions.php";

    session_start();

    if(isset($_SESSION['login'])){
        header("Location: index.php");
    }

    if(isset($_COOKIE['remember'])){
        $_SESSION['login'] = true;
        var_dump($_COOKIE['remember']);
        var_dump($_SESSION['login']);
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Cek apakah email sudah terdaftar:
        $result = mysqli_query($conn, "SELECT password FROM employees WHERE email = '$email'");
    
        if(mysqli_affected_rows($conn)){
            // Cek apakah password sama:
            $passwordDb = mysqli_fetch_assoc($result)['password'];
            if(password_verify($password, $passwordDb)){
                // Login berhasil:
                $_SESSION['login'] = true;

                if(isset($_POST['remember'])){

                    setcookie('remember', true, time()+15);
                    
                    if(isset($_COOKIE['remember'])){
                        $_SESSION['login'] = true;
                    }
                }

                header("Location: index.php");
            } else {
                echo "
                    <script>
                        alert('Email / Password salah!');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Email / Password salah!');
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
        <h1>Login</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"  required>
            </div>
            <div class="mb-4">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control"  required>
            </div>
            <div class="mb-4">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember">Remember me</label>
            </div>
            <div class="mb-4">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <div>
            <a href="register.php">Register</a>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>