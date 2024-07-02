<?php

if (!$_SESSION['admin'])
{
    header('Location: ' . $header_domain);
    exit;
}

if (isset($_POST['user_id']))
{
    $query = $mysqli->prepare("DELETE FROM users WHERE email = ?");
    $query->bind_param("s", $_POST['user_id']);
    $query->execute();

    $response = array("success" => true);
    echo json_encode($response);
} else
{
    $response = array("success" => false);
    echo json_encode($response);
}

?>