<?php
include 'db_conn.php';

if (isset($_COOKIE['asset_management_user'])) {
    $user_email = $_COOKIE['asset_management_user'];

    $login_query = "SELECT * FROM user_data WHERE email = '$user_email'";
    $login_result = mysqli_query($conn, $login_query);
    $login_count = mysqli_num_rows($login_result);

    if ($login_count == 1) {
        $login_get_result = mysqli_fetch_assoc($login_result);
        $user_id = $login_get_result['employee_number'];
        $user_employee_number = $login_get_result['employee_number'];
        $user_email = $login_get_result['email'];
        $user_role = $login_get_result['user_role'];

        $get_name_query = "SELECT * FROM employee_data WHERE employee_number = '$user_employee_number'";
        $get_name_result = mysqli_query($conn, $get_name_query);
        $get_name_row = mysqli_fetch_assoc($get_name_result);
        $user_first_name = $get_name_row['first_name'];
        $user_last_name = $get_name_row['last_name'];
        $user_branch = $get_name_row['branch'];
        $user_location = $get_name_row['location'];
        $user_full_name = $user_first_name . ' ' . $user_last_name;
        $name = "asset_management_user";
        $value = $user_email;
        $expiry = time() + (86400); // Cookie will expire in 30 days
        $path = "/"; // Cookie will be available for the entire domain
        setcookie($name, $value, $expiry, $path);
    } else {
        header("Location: /asset_management/index.php");
    }
} else {
    echo '<script>
                window.location.href = "/asset_management/index.php";
            </script>';
}
?>