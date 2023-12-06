<?php
    // [] Array
    // {} Scope
    // () parentheses
    // echo "<hr>";
    // print_r($oldArr);
    // echo "<br>";
    // var_dump($oldArr);
    // echo "<hr>";


    // == Array
    // = Cara lama.
    $oldArr = array("Pizza", "Burger", "Coto", 1);
    echo $oldArr[0] . "<br>";

    // = Cara Baru
    $newArr = ["Es Pisang Ijo", "Es Doger", "Air Mineral"];
    echo $newArr[0] . "<br>";
    
    // == Multidimensional Array
    $employees = [
        ["Abay", "IT", "32220036"],
        ["Yanti", "IT", "32220037"],
    ];
    var_dump($employees[1][0]);
    echo "<br>";

    // == Associative Array
    $assocArr = [ "name" => "Angkasa", "division" => "IT", "nik" => 32220036];
    var_dump($assocArr["name"]);
    echo "<br>";

    $items = [
        [
            "name" => "Angkasa", 
            "division" => "IT", 
            "nik" => 32220036
        ],
        [
            "name" => "Khairan", 
            "division" => "IT", 
            "nik" => 32220037
        ],
    ];
    
    foreach ($items as $item) {
        echo $item["name"];
        echo "<br>";
    }
    echo "total data: " . count($items);

    // var_dump($items[1]["name"]);
    // echo "<hr>";

    // function countValidName($arr){
    //     $sum = 0;
    //     foreach($arr as $item){
    //         if($item["name"]){
    //             $sum++;
    //         }
    //     }
    //     return $sum;
    // }

    // echo countValidName($items);
    // echo "<br>";


?>