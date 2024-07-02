<?php

$email = $params[0];
$name = $params[1];
$surname = $params[2];
$phone = '-';
$office = '-';
$description = '-';
$password = '-';
$admin = '0';

$query = $mysqli->prepare("INSERT INTO users (email, name, surname, phone, office, description, password, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssssss", $email, $name, $surname, $phone, $office, $description, $password, $admin);
$query->execute();

echo "User with id = ". $email .", name = ". $name ." and surname = " . $surname . " was added. <br>";

?>