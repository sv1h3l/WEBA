<?php

$email = $params[0];
$name = $params[1];
$surname = $params[2];

$query = $mysqli->prepare("UPDATE users SET name = ?, surname = ? WHERE email = ?");
$query->bind_param("sss", $name, $surname, $email);
$query->execute();

echo "You changed name to '". $name ."' and surname to '" . $surname . "' of user with id = ". $email ."<br>";

?>