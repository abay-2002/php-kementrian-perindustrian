<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

function create()
{
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $nik = $_POST["nik"];

        $conn = mysqli_connect("localhost", "root", "", "belajarphp");

        $result = mysqli_query($conn, "INSERT INTO employees VALUES('', '$name', '$email', '$nik')");
        if (mysqli_affected_rows($conn) && $result) {
            echo "
                    <script>
                        alert('Data berhasil terinput');
                        document.location.href = 'index.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Data Tidak berhasil terinput');
                    </script>
                ";
        }
    }
}

function update()
{
    global $conn;
    // Update.
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $nik = $_POST["nik"];
        $id = $_GET["id"];

        mysqli_query($conn, "UPDATE employees SET name ='$name', email = '$email', nik = '$nik' WHERE id = $id");

        echo "
            <script>
                alert('Data berhasil diupdate!');
                document.location.href = 'index.php'
            </script>
        ";
    }
}

function read($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

function readRow($id){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM employees WHERE id = $id");

    $row = mysqli_fetch_assoc($result);
    return $row;
}

function delete()
{
    global $conn;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        mysqli_query($conn, "DELETE FROM employees WHERE id = $id");

        echo "
                <script>
                    alert('Row berhasil terhapus');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        header("Location: 'index.php'");
    }
}
