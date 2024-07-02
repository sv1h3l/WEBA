<?php

$params = $router['params'];

$query = $mysqli->prepare("SELECT admin FROM users where email = ?");
$query->bind_param("s", $params[0]);
$query->execute();
$query_result = $query->get_result()->fetch_assoc();

if ($query_result && $query_result['admin'] == 1)
{
    $bol = true;
} else
{
    $bol = false;
}

?>