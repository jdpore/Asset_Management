<?php
include 'db_conn.php';
include 'auto_redirect.php';

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $category_name = $_GET['category_name'];

    $delete_category_query = "DELETE FROM category WHERE id = $category_id";
    $delete_category_reult = mysqli_query($conn, $delete_category_query);

    if ($delete_category_reult) {
        $transaction = "Deleted a category: $category_name";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            header("Location: /asset_management/pages/categories.php");
        }
    }
}

if (isset($_GET['delete_employee']) && isset($_GET['employee_name'])) {
    $delete_employee_id = $_GET['delete_employee'];
    $employee_name = $_GET['employee_name'];

    $delete_employee_query = "DELETE FROM employee_data WHERE id = $delete_employee_id";
    $delete_employee_result = mysqli_query($conn, $delete_employee_query);

    if ($delete_employee_result) {
        $transaction = "Deleted a employee: $employee_name";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            header("Location: /asset_management/pages/employee_data.php");
        }
    }
}

if (isset($_GET['delete_user'])) {
    $delete_user_id = $_GET['delete_user'];

    $delete_user_query = "DELETE FROM user_data WHERE employee_number = $delete_user_id";
    $delete_user_result = mysqli_query($conn, $delete_user_query);

    if ($delete_user_result) {
        $transaction = "Deleted a user: $delete_user_id";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            header("Location: /asset_management/pages/employee_data.php");
        }
    }
}

if (isset($_GET['delete_asset'])) {
    $delete_asset_sticker_number = $_GET['delete_asset'];

    $delete_asset_query = "DELETE FROM inventory WHERE id = $delete_asset_sticker_number";
    $delete_asset_result = mysqli_query($conn, $delete_asset_query);

    if ($delete_asset_result) {
        $transaction = "Deleted a Asset: $delete_asset_sticker_number";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            header("Location: /asset_management/pages/asset_management.php");
        }
    }
}


?>