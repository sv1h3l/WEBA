<?php

$params = $router['params'];

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
  if (isset($_GET['id']))
  {
    $params[0] = $_GET['id'];
    include "Endpoints/getId.php";
  } else
  {
    include "Endpoints/get.php";
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['surname']))
{
  $params[0] = $_GET['id'];
  $params[1] = $_GET['name'];
  $params[2] = $_GET['surname'];
  include "Endpoints/post.php";
} else if ($_SERVER['REQUEST_METHOD'] === 'UPDATE' && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['surname']))
{
  $params[0] = $_GET['id'];
  $params[1] = $_GET['name'];
  $params[2] = $_GET['surname'];
  include "Endpoints/update.php";
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id']))
{
  $params[0] = $_GET['id'];
  include "Endpoints/delete.php";
}
else if ($router['method'] == 'get' && empty($params))
{
  include "Endpoints/$router[method].php";
} else if ($router['method'] == 'get')
{
  include "Endpoints/getId.php";
} else if ($router['method'] == 'post' && !empty($params[0]) && !empty($params[1]) && !empty($params[2]))
{
  include "Endpoints/post.php";
} else if ($router['method'] == 'update' && !empty($params[0]) && !empty($params[1]) && !empty($params[2]))
{
  include "Endpoints/update.php";
} else if ($router['method'] == 'delete' && !empty($params[0]))
{
  include "Endpoints/delete.php";
} else
{
  echo '<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
      <h1 class="pb-3 border-bottom">Wrong rest API entry point.</h1>
      <h3>Entry points are:<br>&nbsp - get<br>&nbsp - get/id<br>&nbsp - post<br>&nbsp - update/id<br>&nbsp - delete/id<br></h3>
      </main>';
}

?>