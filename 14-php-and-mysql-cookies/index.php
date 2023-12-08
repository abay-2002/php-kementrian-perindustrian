<?php
require "functions.php";

session_start();

if(!$_SESSION['login']){
    header("Location: login.php");
}

if(isset($_COOKIE['remember'])){
    $_SESSION['login'] = true;
}

$conn = mysqli_connect("localhost", "root", "", "belajarphp");

$rows = read("SELECT * FROM employees");

// Search
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];

    $rows = read("SELECT * FROM employees WHERE name OR email LIKE '%$keyword%';");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="mb-2">
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <form action="" method="GET">
                <input type="text" name="keyword" placeholder="Ketik keyword.." class="form-control mb-2">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
        <table border="1" cellspacing="0" cellpadding="10" class="table">
            <tr>
                <th>Name</th>
                <th>Picture</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td>
                        <?php if ($row["picture"] !== null) { ?>
                            <img src="./img/<?= $row["picture"] ?>" width="100" alt="<?= $row["name"] ?>">
                        <?php } else { ?>
                            <a href="update.php?id=<?= $row['id'] ?>&oldpicture=<?= $row['picture'] ?>">Update Pict</a>
                        <?php } ?>
                    </td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["nik"] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>&oldpicture=<?= $row['picture'] ?>">Update</a>
                        <span>/</span>
                        <a onclick="return confirm('Yakin hapus?')" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <div>
            <a href="create.php">Create New User</a>
        </div>
    </div>
</body>
</html>