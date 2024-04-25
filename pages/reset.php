<?php
include '../php/db_conn.php';

$reset_query = "SELECT * FROM inventory";
$reset_result = mysqli_query($conn, $reset_query);

foreach($reset_result as $reset_row){
    $new_query = "UPDATE `accountability_history` SET 
    `asset_id`='" . $reset_row['id'] . "' WHERE `asset_id` = '" . $reset_row['asset_sticker_number'] . "'";
    $new_result = mysqli_query($conn, $new_query);

}
?>