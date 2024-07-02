<?php

$email = $params[0];

$query = $mysqli->prepare("DELETE FROM users WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();

echo "You deleted user with id = ". $email ."<br>";

?>