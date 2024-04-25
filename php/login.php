<?php
include 'db_conn.php';

if (isset ($_COOKIE['asset_management_user'])) {
    $user_email = $_COOKIE['asset_management_user'];

    $login_query = "SELECT * FROM user_data WHERE email = '$user_email'";
    $login_result = mysqli_query($conn, $login_query);
    $login_count = mysqli_num_rows($login_result);

    if ($login_count == 1) {
        $login_get_result = mysqli_fetch_assoc($login_result);
        $user_id = $login_get_result['id'];
        $user_employee_number = $login_get_result['employee_number'];
        $user_email = $login_get_result['email'];
        $user_role = $login_get_result['user_role'];

        $name = "asset_management_user";
        $value = $user_email;
        $expiry = time() + (86400); // Cookie will expire in 30 days
        $path = "/"; // Cookie will be available for the entire domain
        setcookie($name, $value, $expiry, $path, $domain, $secure, $httpOnly);
        header("Location: /asset_management/pages/employee_data.php");
    } else {
        header("Location: /asset_management/index.php");
    }
}

if (isset ($_POST['login_button'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];

    $login_query = "SELECT * FROM user_data WHERE email = '$user_name' AND password = '$user_password'";
    $login_result = mysqli_query($conn, $login_query);
    $login_count = mysqli_num_rows($login_result);

    if ($login_count == 1) {
        $login_get_result = mysqli_fetch_assoc($login_result);
        $user_id = $login_get_result['id'];
        $user_employee_number = $login_get_result['employee_number'];
        $user_email = $login_get_result['email'];
        $user_role = $login_get_result['user_role'];

        $name = "asset_management_user";
        $value = $user_email;
        $expiry = time() + (86400); // Cookie will expire in 30 days
        $path = "/"; // Cookie will be available for the entire domain
        $domain = ""; // If you want to restrict the cookie to a specific subdomain, specify it here
        $secure = false; // If true, the cookie will only be sent over secure connections (HTTPS)
        $httpOnly = false; // If true, the cookie will be accessible only through the HTTP protocol (not accessible via JavaScript)
        setcookie($name, $value, $expiry, $path, $domain, $secure, $httpOnly);
        header("Location: /asset_management/pages/employee_data.php");
    } else {
        echo '<script>
                window.location.href = "/asset_management/index.php";
                alert("Login failed. Invalid username or password!")
            </script>';
    }
}

?>