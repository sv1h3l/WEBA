<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
  <h1 class="pb-3 border-bottom">Users</h1>
  <?php

  if ($router['method'] == 'new' || $router['method'] == 'delete' || $router['method'] == 'edit')
  {
    include "Views/$router[controller]/$router[method].php";
  } else if (empty($router['method']) || $router['method'] == 'show')
  {
    include "Views/$router[controller]/show.php";
  }

  ?>
</main>