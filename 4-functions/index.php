<?php
    // == User defined Function
    function greet($param)
    {
        return "Hello " . $param;
    }

    function age($number)
    {
        if ($number > 18) {
            return "$number you're allowed";
        } else if ($number > 10){
            return "$number you're not allowed";
        } else {
            return "$number you're too young";
        }
    }

    greet("argument");

    // == Built in function
    // Get current date and time
    $currentDateTime = date('Y-m-d H:i:s');
    $userAge = 10;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Function</title>
</head>
    <body>
        <h1>
            <?= greet("Abay") ?>
        </h1>
        <hr>

        <h2><?= age($userAge) ?> menggunakan function</h2>

        <?php if($userAge > 18) { ?>
            <h2><?= $userAge ?> you're allowed</h2>
        <?php } else if ($userAge > 10) { ?>
            <h2><?= $userAge ?> you're not allowed</h2>
        <?php } else { ?>
            <h2><?= $userAge ?> you're too young</h2>
        <?php } ?>

        <p>Current date and time: <?= $currentDateTime ?></p>
    </body>
</html>