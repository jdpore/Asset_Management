<?php
include 'db_conn.php';
include 'auto_redirect.php';

$category_query = "SELECT * FROM category";
$category_result = mysqli_query($conn, $category_query);
?>