<?php
require_once __DIR__ . "../../lib/menu.php";
require_once __DIR__ . "../../lib/pdo.php";
require_once __DIR__ . "../../lib/functions.php";
require_once __DIR__ . "../../lib/session.php";


$headTitle = basename($_SERVER["SCRIPT_NAME"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/icon.css">
  <title><?= $menu[$headTitle]["headTitle"]; ?></title>
</head>

<body>
  <header>
    <div class="menu_logo">
      <a href="/">Arcadia</a>
    </div>
    <div class="menu">
      <ul class="menu_list" id="menu">
        <?php foreach ($menu as $key => $menuItem) {
          if (!array_key_exists("excluded", $menuItem)) {?>
          <li><a class="menu_item" href="/<?php if ($key === "index.php") {
                                            echo "index.php";
                                          } else {
                                            echo "pages/" . $key;
                                          } ?>"><?= $menuItem["title"] ?></a></li>

        <?php }} ?>
        <li><a class="button" href="/pages/signin.php">Connexion</a></li>
      </ul>
      <a href="#" class="show_menu_button"><i class="bi bi-list"></i></a>
    </div>
  </header>
  <main>