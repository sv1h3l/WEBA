<?php

$query = $mysqli->prepare("INSERT INTO logins (email) VALUES (?)");
$query->bind_param("s", $params[0]);
$query->execute();

?>