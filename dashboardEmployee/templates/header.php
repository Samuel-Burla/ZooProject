<?php
require_once __DIR__ . "../../lib/menu.php";
require_once __DIR__ . "../../../lib/pdo.php";
require_once __DIR__ . "../../../lib/functions.php";
require_once __DIR__ . "../../../lib/session.php";

function employeeOnly()
{
    if ($_SESSION['user']['role_id'] !== 3) {
        header('location: /pages/signin.php');
    }
}
employeeOnly();

$headTitle = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dashboardEmployee/assets/css/styles.css">
    <title><?= $menu["$headTitle"]["headTitle"] ?></title>
</head>

<body class="d-flex">
    <header class="mobile">
        <div class="menu_logo">
            <a href="/">Arcadia</a>
        </div>
        <div class="menu">
            <ul class="menu_list" id="menu">
                <?php foreach ($menu as $key => $menuItem) { ?>
                    <li><a class="menu_item" href="/<?php if ($key === "index.php") {
                                                        echo "index.php";
                                                    } else {
                                                        echo "pages/" . $key;
                                                    } ?>"><?= $menuItem["title"] ?></a></li>
                <?php } ?>
                <li><a class="button" href="/pages/signin.php">Connexion</a></li>
            </ul>
            <a href="#" class="show_menu_button"><i class="bi bi-list"></i></a>
        </div>
    </header>
    <header class="desktop">
        <div class="d-flex bootstrap_sidebar flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="/dashboardEmployee" class="d-flex m-3 align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Dashboard employee</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <?php foreach ($menu as $key => $menuItem) { ?>
                    <li class="nav-item">
                        <a href="/dashboardEmployee/<?php if ($key == "index.php") {
                                            echo "index.php";
                                        } else {
                                            echo "pages/" . $key;
                                        } ?>" class="nav-link text-white">
                            <?= $menuItem["title"] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <hr>
            <div class="d-flex">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>José Arcad</strong>
                </a>
                <a class="button signoutButton" href="/pages/signout.php">Déconnexion</a>
            </div>
        </div>
    </header>
    <main>