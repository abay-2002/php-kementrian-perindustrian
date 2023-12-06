<?php
    // == local
    $a = "Hello World";
    // echo $a;

    // == global
    function greet(){
        global $a;
        $b = "Hello Mom";
        return $a;
    }

    global $b;
    echo $b;
    echo greet();
    echo "<br>";

    // == static
    function myTest() {
        static $x = 0;
        echo $x;
        echo "<br>";
        $x++;
    }
    
    myTest();
    myTest();
    myTest();
    
    // == SUPERGLOBAL ==
    echo "<br>";

    var_dump($_GET);
?>