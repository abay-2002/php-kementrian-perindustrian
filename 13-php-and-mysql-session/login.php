<?php
    require "functions.php";
    session_start();

    if(isset($_SESSION['login'])){
        header("Location: index.php");
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
    <h1>Login</h1>
    <hr>
    <form action="" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <button type="submit" name="submit">Login</button>
        </div>
    </form>
    <div>
        <a href="register.php">Register</a>
    </div>
</body>
</html>