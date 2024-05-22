<?php
require_once __DIR__."/config.php";

// session_set_cookie_params(
//     $lifetime_or_options= 3600,
//      $path = "/localhost:3000",
//      $domain = "127.0.0.1", 
//      /*$secure = null,*/ 
//      $httponly = true
// );

// session_set_cookie_params([
//     'lifetime' => 3600,
//     'path' => '/',
//     'domain' => "127.0.0.1",
//     /*'secure' => $secure,*/
//     'httponly' => true
// ]);

// var_dump($_SERVER["HTTP_HOST"]);

session_start();
?>