<?php

$params = $router['params'];

include "Models/sql/validate.php";

if ($bool)
{
        include "Models/sql/addLogin.php";
        include "Models/sql/isAdmin.php";

        $_SESSION['email'] = $params[0];
        $_SESSION['loggedin'] = true;

        if ($bol)
        {
                $_SESSION['admin'] = true;
        } else
        {
                $_SESSION['admin'] = false;
        }
        header("Location: " . $header_domain . "dashboard");
} else
{
        header("Location: " . $header_domain);
}

?>