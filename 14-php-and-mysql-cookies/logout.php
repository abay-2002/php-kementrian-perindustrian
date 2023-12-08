<?php
    session_start();
    session_destroy();

    setcookie('remember','', time() - 3600);

    header("Location: login.php");
?>