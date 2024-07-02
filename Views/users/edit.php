<?php
function formMaker()
{
    echo "<label for='name'>name:</label><br>";
    echo "<input type='text' id='name' name='name' required><br><br>";

    echo "<label for='surname'>surname:</label><br>";
    echo "<input type='text' id='surname' name='surname' required><br><br>";

    echo "<label for='phone'>phone:</label><br>";
    echo "<input type='text' id='phone' name='phone' required><br><br>";

    echo "<label for='office'>office:</label><br>";
    echo "<input type='text' id='office' name='office' required><br><br>";

    echo "<label for='description'>description:</label><br>";
    echo "<input type='text' id='description' name='description' required><br><br>";

    echo "<label for='password'>password:</label><br>";
    echo "<input type='text' id='password' name='password' required><br><br>";

    echo "<label for='admin'>admin:</label><br>";
    echo "<input type='number' id='admin' name='admin' required><br><br>";
}

if (!$_SESSION['admin'])
{
    header('Location: ' . $header_domain);
    exit;
}

$params = $router['params'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $phone = $_POST["phone"];
    $office = $_POST["office"];
    $description = $_POST["description"];
    $password = $_POST["password"];
    $admin = $_POST["admin"];

    $query = $mysqli->prepare("UPDATE users SET name = ?, surname = ?, phone = ?, office = ?, description = ?, password = ?, admin = ? WHERE email = ?");
    $query->bind_param("ssssssss", $name, $surname, $phone, $office, $description, $password, $admin, $params[0]);
    $query->execute();

    header('Location: ' . $header_domain . 'users?edit=true');
}
?>

<h3>Editing user with email:
    <?php echo $params[0]; ?>
</h3>
<form method='post'>

    <?php formMaker() ?>

    <input type='submit' value='Edit user'>
</form>