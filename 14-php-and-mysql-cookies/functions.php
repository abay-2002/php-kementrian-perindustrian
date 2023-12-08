<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

function create()
{
    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $nik = htmlspecialchars($_POST["nik"]);
        $hashedPassword = htmlspecialchars(password_hash($_POST["password"], PASSWORD_DEFAULT));

        $conn = mysqli_connect("localhost", "root", "", "belajarphp");

        $result = mysqli_query($conn, "INSERT INTO employees VALUES('', '$name', '$email', '$nik', NULL, '$hashedPassword')");
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
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $nik = htmlspecialchars($_POST["nik"]);
        $id = htmlspecialchars($_GET["id"]);

        $oldpicture = $_POST["oldpicture"];
        $picture = uploadgambar();

        // Cek apakah user mengubah picture?
        if($picture){
            // User mengubah picture.
            unlink("./img/$oldpicture");
        } else {
            // User tidak mengubah picture.
            $picture = $oldpicture; 
        }

        mysqli_query($conn, "UPDATE employees SET name ='$name', email = '$email', nik = '$nik', picture = '$picture' WHERE id = $id");

        echo "
            <script>
                alert('Data berhasil diupdate!');
                document.location.href = 'index.php'
            </script>
        ";
    }
}

function uploadGambar(){
    // 1. Check apakah filenya valid.
    $filetype = $_FILES['picture']['type'];
    $validextensions = ['image/jpeg', 'image/png', 'image/jpg']; 
    
    if( in_array($filetype, $validextensions) ){
        // 2. Generate nama file.
        $filename = uniqid() . '.jpg';
        
        // 3. Simpan file.
        $tmpname = $_FILES['picture']['tmp_name'];
        move_uploaded_file($tmpname, "./img/$filename");

        return $filename;
    } else {
        echo "
            <script>
                alert('Jenis file tidak valid!');
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
