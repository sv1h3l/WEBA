<?php
// Předpokládáme, že máte proměnnou $activePage, která obsahuje hodnotu aktivní stránky

// Funkce pro nastavení třídy "active" a atributu "aria-current"
function setActive($pageName, $activePage) {
    if ($pageName === $activePage) {
        echo 'class="nav-link active" aria-current="page"';
    } else {
        echo 'class="nav-link link-dark"';
    }
}
?>

<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
            <a href="<?php echo $domain; ?>dashboard" <?php setActive("dashboard", ($_GET['pozadavek'] ?? '')); ?>>
                <span class="icon">
                  <i class="bi bi-easel"></i>
                </span>
                Dashboard
              </a>
            </li>
            <li>
              <a href="<?php echo $domain; ?>items" <?php setActive("items", ($_GET['pozadavek'] ?? '')); ?>>
                <span class="icon">
                  <i class="bi bi-card-list"></i>
                </span>
                Items
              </a>
            </li>
            <li>
              <a href="<?php echo $domain; ?>others" <?php setActive("others", ($_GET['pozadavek'] ?? '')); ?>>
                <span class="icon">
                  <i class="bi bi-box"></i>
                </span>
                Others
              </a>
            </li>
            <li>
              <a href="<?php echo $domain; ?>users" <?php setActive("users", ($_GET['pozadavek'] ?? '')); ?>>
                <span class="icon">
                  <i class="bi bi-person-circle"></i>
                </span>
                Users
              </a>
            </li>
          </ul>
        </div>
      </nav>