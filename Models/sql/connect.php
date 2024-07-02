<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_db = 'weba';

    $mysqli = new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db,
    );

    if ($mysqli->connect_error)
    {
        echo 'Error: ' . $mysqli->connect_error;
        exit();
    }
?>