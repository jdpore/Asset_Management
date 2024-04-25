<?php
include 'db_conn.php';

if (isset ($_GET['logout'])) {
    $cookieName = "asset_management_user";
    $cookiePath = "/";
    setcookie($cookieName, "", time() - 1, $cookiePath);
    header("Location: /asset_management/index.php");
}

?>