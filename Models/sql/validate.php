<?php

$query = $mysqli->prepare("SELECT password FROM users where email = ?");
$query->bind_param("s", $params[0]);
$query->execute();
$query_result = $query->get_result()->fetch_assoc();

if ($query_result && $query_result['password'] == $params[1])
{
    $bool = true;
} else
{
    $bool = false;
}

?>