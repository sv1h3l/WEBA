<?php

if (!$_SESSION['admin'])
{
    header('Location: ' . $header_domain);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $phone = $_POST["phone"];
    $office = $_POST["office"];
    $description = $_POST["description"];
    $password = $_POST["password"];
    $admin = $_POST["admin"];

    $query = $mysqli->prepare("INSERT INTO users (email, name, surname, phone, office, description, password, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssssss", $email, $name, $surname, $phone, $office, $description, $password, $admin);
    $query->execute();

    header('Location: ' . $header_domain . 'users?new=true');
}

?>

<h3>Add new user</h2>
    <form method='post'>

        <label for='email'>email:</label><br>
        <input type='text' id='email' name='email' required><br><br>

        <label for='name'>name:</label><br>
        <input type='text' id='name' name='name' required><br><br>

        <label for='surname'>surname:</label><br>
        <input type='text' id='surname' name='surname' required><br><br>

        <label for='phone'>phone:</label><br>
        <input type='text' id='phone' name='phone' required><br><br>

        <label for='office'>office:</label><br>
        <input type='text' id='office' name='office' required><br><br>

        <label for='description'>description:</label><br>
        <input type='text' id='description' name='description' required><br><br>

        <label for='password'>password:</label><br>
        <input type='text' id='password' name='password' required><br><br>

        <label for='admin'>admin:</label><br>
        <input type='number' id='admin' name='admin' required><br><br>

        <input type='submit' value='Add new user'>
    </form>