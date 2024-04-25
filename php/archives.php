<?php
include 'db_conn.php';

$logs_query = "SELECT * FROM logs";
$logs_result = mysqli_query($conn, $logs_query);
?>