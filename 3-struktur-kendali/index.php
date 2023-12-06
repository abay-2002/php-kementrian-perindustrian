<?php
    // Struktur Kendali / Control Flow

    // == Pengulangan
    // for
    $x = 5;
    for ($i=1; $i < $x; $i++) { 
        echo "for loop";
        echo "<br>";
    }

    // while
    $a = 9;
    while ($a < 10) {
        echo "While";
        echo "<br>";
        $a+=5;
    }

    // do.. while
    $b = 5;
    do {
        echo $b;
        echo "<br>";
        $b++;
    } while ($b < 10);

    // foreach

    // == Pengkondisian
    // if
    $b = 1;
    if($b === 10){
        // lakukan baris program.
        echo "Hello Mom";
        echo "<hr>";
    }

    // if else
    if(!($b === 10) && ($b === 1) || ($b === 2)){
        echo "if else statement";
        echo "<br>";
    } else {
        echo "$b is not equal to 10";
        echo "<br>";
    }

    $c = 1;
    // if else.. else if
    if ($c === 10) {
        echo "if else statement";
        echo "<br>";
    } else if ($c === 1){
        echo "if else statement";
        echo "<br>";
    } else if ($c === 2){
        echo "$c is not equal to 2";
        echo "<br>";
    } else {
        echo "$c is not equal to 10 or 1 or 2";
        echo "<br>";
    }
    
?>