<?php
    // Comment / Komentar
    // ini adalah Komentar
    /* 
        ini komentar
        ini juga komentar
    */

    // asdasd
    // asdadas
    // jkhk
    // asdsadsad

    // Arithmatic Operators
    // ()   Kurung
    // *    Kali
    // /    Bagi
    // +    Tambah
    // -    Kurang
    // %    Modulos
    echo "Operator Aritmatika";
    echo "<br>";
    $a = 5;
    $b = 5;
    $c = 2;
    $result = ($a * $b) - $c;
    echo "($a x $b) - $c = $result";

    // Interpolasi pada javascript:
    // console.log("${a}");

    // Assignment Operators
    // = += -= *= /= %= .=
    echo "<hr>";
    echo "Operator Penugasan";
    echo "<br>";
    $e = 2;
    echo $e += 3;
    echo "<br>";
    echo $e -= 3;
    echo "<br>";
    echo $e *= 3;
    echo "<br>";
    echo $e /= 3;
    echo "<br>";
    echo $e %= 3;
    echo "<br>";

    // Concat
    $x = "Hello";
    $y = "World";
    echo $x .= $y;
    echo "<hr>";

    // == Concatination ==
    // .
    echo "Operator Concatination / Penggabung String";
    echo "<br>";
    $greet = "Good morning";
    $name = "Admin";
    echo $greet . " " . $name;

    // Comparison Operators
    // > < == === != >= <= 
    echo "<hr>";
    echo "Operator Perbandingan";
    echo "<br>";
    $angkaPertama = 20;
    $angkaKedua = 20;
    // var_dump($angkaPertama < $angkaKedua);
    echo "<br>";
    var_dump($angkaPertama >= $angkaKedua);

    // Logical Operators
    echo "<hr>";
    echo "Operator Logika";
    echo "<br>";
    // &&   AND     Sinonim dari Perkalian x
    // ||   OR      Sinonim dari Pertambahan +
    // !    NOT
    // Returning a  Boolean
    $x = True;
    $y = True;
    // var_dump($x && $y);
    echo "<br>";
    var_dump(!$x);
?>