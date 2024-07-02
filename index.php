<!doctype html>
<html lang="en">

<head>
  <title>Simple Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

  <link rel="stylesheet" href="http://localhost/Simple-administratioN/bootstrap-styles.css">
  <link rel="stylesheet" href="http://localhost/Simple-administratioN/my-styles.css">
  <link rel="stylesheet" href="http://localhost/Simple-administratioN/icons.css">
</head>

<style>
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    padding: 48px 0 0;
  }

  .sidebar-sticky {
    height: calc(100vh - 48px);
    overflow-x: hidden;
    overflow-y: auto;
  }
</style>

<body>

  <?php
  $domain = "/Simple-administratioN/";
  $header_domain = "http://localhost/Simple-administratioN/";

  function process_URL()
  {
    $URL = explode('/', $_GET['url'] ?? '');

    $controller = $URL[0] ?? null;
    $method = $URL[1] ?? null;
    $num_of_params = count($URL);

    $params = [];
    for ($i = 2; $i < $num_of_params; $i++)
    {
      $params[] = $URL[$i] ?? null;
    }

    return ['controller' => $controller, 'method' => $method, 'params' => $params];
  }

  $router = process_URL();
  include "Models/sql/connect.php";

  if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

  //$_SESSION["loggedin"] = true;
  
  if (!isset($_SESSION["loggedin"]))
  {
    if ($router['controller'] == 'loging')
    {
      include "Views/loging/login.php";
    } else
    {
      $router = ['controller' => 'login', 'method' => null, 'params' => null];
      include "Controllers/$router[controller].php";
    }
  } else
  {
    if ($router['controller'] == 'restAPI')
    {
      include "Controllers/restAPI.php";
    } else
    {
      include "Controllers/header.php";
      include "Controllers/menu.php";

      if ($router['controller'] == 'dashboard' || $router['controller'] == 'users' || $router['controller'] == 'items' || $router['controller'] == 'others')
      {
        include "Controllers/$router[controller].php";
      } else if ($router['controller'] == 'logout')
      {
        include "Views/loging/logout.php";
      } else if (empty($router['controller']))
      {
        include "Controllers/dashboard.php";
      } else
      {
        include "Controllers/blank.php";
      }

      include "Models/sql/disconnect.php";
    }
  }

  ?>

  <script src="./bootstrap.js"></script>
</body>

</html>