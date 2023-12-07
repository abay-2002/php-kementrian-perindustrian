<?php
require "functions.php";

session_start();

if(!$_SESSION['login']){
    header("Location: login.php");
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
    <style>
        div {
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <form action="" method="GET">
                <input type="text" name="keyword" placeholder="Ketik keyword..">
                <button type="submit">Search</button>
            </form>
        </div>
        <table border="1" cellspacing="0" cellpadding="10">
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
    </div>
    <div>
        <a href="create.php">Create New User</a>
    </div>

</body>

</html>