<?php
unset($_SESSION["loggedin"]);
header("Location: $header_domain");
?>