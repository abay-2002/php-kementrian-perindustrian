<?php
    $conn = mysqli_connect("localhost", "root", "", "belajarphp");

    $result = mysqli_query($conn, "SELECT * FROM employes");

    var_dump($result);

    echo "<hr>";

    while($row = mysqli_fetch_assoc($result)){
        var_dump($row);
        echo "<br>";
    }
?>