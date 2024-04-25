<?php
include 'db_conn.php';
include 'auto_redirect.php';

$department_query = "SELECT * FROM category WHERE field = 'department'";
$department_result = mysqli_query($conn, $department_query);

$branch_query = "SELECT * FROM category WHERE field = 'branch'";
$branch_result = mysqli_query($conn, $branch_query);

$location_query = "SELECT * FROM category WHERE field = 'location'";
$location_result = mysqli_query($conn, $location_query);
?>