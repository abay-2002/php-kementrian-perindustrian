<?php
    $conn = mysqli_connect("localhost", "root", "", "belajarphp");

    $result = mysqli_query($conn, "SELECT * FROM employees");

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>
<body>
    <h1>Employees</h1>
    <?php foreach($rows as $row) : ?>
        <ol>
            <li>name: <?= $row["name"] ?></li>
            <li>email: <?= $row["email"] ?></li>
            <li>nik: <?= $row["nik"] ?></li>
        </ol>
    <?php endforeach; ?>
</body>
</html>
