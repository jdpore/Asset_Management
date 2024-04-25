<?php
include 'db_conn.php';
include 'auto_redirect.php';

if (isset($_POST['add_category_button'])) {
    $field = $_POST['field'];
    $category = $_POST['category'];

    $insert_category_query = "INSERT INTO category (field, category_name) VALUES ('$field','$category')";
    $insert_category_result = mysqli_query($conn, $insert_category_query);

    if ($insert_category_result) {
        $transaction = "Created a category: $category";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        echo '<script>
                window.location.href = "/asset_management/pages/categories.php";
                alert("Added a Category.")
            </script>';
    } else {
        echo '<script>
                window.location.href = "/asset_management/pages/categories.php";
                alert("Added a Category.")
            </script>';
    }
}

if (isset($_POST['add_employee_button'])) {
    $employee_number = $_POST['employee_number'];
    $email = $_POST['email'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $add_full_name = $first_name . ' ' . $last_name;
    $department = $_POST['department'];
    $branch = $_POST['branch'];
    $location = $_POST['location'];
    $designation = $_POST['designation'];

    $add_employee_query = "INSERT INTO employee_data(
                                employee_number, 
                                email, 
                                last_name, 
                                first_name, 
                                department, 
                                branch, 
                                location, 
                                designation) 
                            VALUES (
                                '$employee_number',
                                '$email',
                                '$last_name',
                                '$first_name',
                                '$department',
                                '$branch',
                                '$location',
                                '$designation')";
    $add_employee_result = mysqli_query($conn, $add_employee_query);
    if ($add_employee_result) {
        $transaction = "Added Employee: $add_full_name";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        echo '<script>
                window.location.href = "/asset_management/pages/employee_data.php";
                alert("Added Employee.")
            </script>';
    } else {
        echo '<script>
                window.location.href = "/asset_management/pages/employee_data.php";
                alert("Error Adding Employee.")
            </script>';
    }
}
if (isset($_POST['add_user_button'])) {
    $activate_user_employee_number = $_POST['user_employee_number'];
    $activate_user_role = $_POST['user_role'];

    $get_user_email_query = "SELECT first_name, last_name, email, branch FROM employee_data WHERE employee_number = '$activate_user_employee_number'";
    $get_user_email_result = mysqli_query($conn, $get_user_email_query);
    $get_user_email_row = mysqli_fetch_assoc($get_user_email_result);
    $activate_user_email = $get_user_email_row['email'];
    $activate_user_branch = $get_user_email_row['branch'];
    $activate_user_first_name = $get_user_email_row['first_name'];
    $activate_user_last_name = $get_user_email_row['last_name'];
    $activate_user_full_name = $activate_user_first_name . ' ' . $activate_user_last_name;

    $add_user_query = "INSERT INTO user_data(
                            employee_number, 
                            email, 
                            password, 
                            user_role, 
                            branch) 
                        VALUES (
                            '$activate_user_employee_number',
                            '$activate_user_email',
                            'Ubix@1234',
                            '$activate_user_role',
                            '$activate_user_branch')";
    $add_user__result = mysqli_query($conn, $add_user_query);
    if ($add_user__result) {
        $transaction = "Activated Account: $activate_user_full_name";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            echo '<script>
                window.location.href = "/asset_management/pages/user_management.php";
                alert("Added Employee.")
            </script>';
        }
    }
}

if (isset($_POST['add_asset_button'])) {
    $asset_serial_number = $_POST['asset_serial_number'];
    $asset_number = $_POST['asset_number'];
    $asset_sticker_number = $_POST['asset_sticker_number'];
    $asset_name = $_POST['asset_name'];
    $asset_date_acquired = $_POST['asset_date_acquired'];
    $asset_type = $_POST['asset_type'];
    $asset_category = $_POST['asset_category'];
    $asset_status = $_POST['asset_status'];
    $asset_condition = $_POST['asset_condition'];
    $asset_brand_model = $_POST['asset_model'];
    $asset_processor = "N/A";
    $asset_operating_system = "N/A";
    $asset_storage = "N/A";
    $asset_ram = "N/A";
    $asset_description = $_POST['asset_description'];

    if ($asset_category == "Unit") {
        $asset_processor = $_POST['asset_processor'];
        $asset_operating_system = $_POST['asset_operating_system'];
        $asset_storage = $_POST['asset_storage'];
        $asset_ram = $_POST['asset_ram'];
    }

    $add_asset_query = "INSERT INTO inventory(
                            asset_number, asset_name, asset_type, asset_category, 
                            asset_serial_number, asset_sticker_number, asset_status,
                            asset_condition, asset_description, asset_acquired_date,
                            asset_brand_model, asset_processor, asset_storage, asset_ram, 
                            asset_operating_system, asset_branch, asset_location)
                        VALUES (
                            '$asset_number', '$asset_name', '$asset_type', '$asset_category',
                            '$asset_serial_number', '$asset_sticker_number', '$asset_status',
                            '$asset_condition', '$asset_description', '$asset_date_acquired',
                            '$asset_brand_model', '$asset_processor', '$asset_storage', '$asset_ram', 
                            '$asset_operating_system', '$user_branch', '$user_location')";
    $add_asset_result = mysqli_query($conn, $add_asset_query);
    if ($add_asset_result) {
        $transaction = "Added Asset: $asset_name";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            echo '<script>
            window.location.href = "/asset_management/pages/asset_management.php";
            alert("Added Asset.")
        </script>';
        }
    }
}

if (isset($_POST['assign_asset_button'])) {
    $accountable_employee_number = $_POST['accountable_employee_number'];
    $selected_assets_input = $_POST['selected_assets_input'];

    $array = json_decode($selected_assets_input, true);
    $length = count($array);
    $currentDate = date("Y-m-d");
    $year = date("y");
    $month = date("m");
    $day = date("d");
    $branch_name = ($user_branch == "Sucat") ? "SCT" : "MKT";
    $count_query = "SELECT * FROM accountability_details WHERE date_allocation = '$currentDate'";
    $count_result = mysqli_query($conn, $count_query);
    $row_count = mysqli_num_rows($count_result);

    $employee_data_query = "SELECT location FROM employee_data WHERE employee_number = '$accountable_employee_number'";
    $employee_data_result = mysqli_query($conn, $employee_data_query);
    $employee_data = mysqli_fetch_assoc($employee_data_result);
    if ($employee_data) {
        $location = $employee_data['location'];
    }
    $row_count += 1;
    $formatted_row_count = str_pad($row_count, 3, '0', STR_PAD_LEFT);
    $control_number = 'UBX-' . $branch_name . '-' . $year . $month . $day . '-' . $formatted_row_count;
    for ($i = 0; $i < $length; $i++) {
        $add_accountability_query = "INSERT INTO accountability_details(
                            employee_number, asset_id,
                            control_number, location, branch_encoded, status)
                        VALUES (
                            '$accountable_employee_number', '$array[$i]',
                            '$control_number', '$location', '$user_branch', 'Deployed')";
        $add_accountability_result = mysqli_query($conn, $add_accountability_query);
        if ($add_accountability_result) {
            $update_asset_query = "UPDATE inventory SET asset_status = 'Deployed', asset_location = '$location'  WHERE id = $array[$i]";
            $update_asset_result = mysqli_query($conn, $update_asset_query);

            $accountability_history_query = "INSERT INTO accountability_history (asset_sticker_number, employee_id, transaction, control_number,person_incharge, location) 
                                                VALUES (
                                                    '$array[$i]' ,'$accountable_employee_number' ,'Deployed', '$control_number','$user_id', '$location')";
            $accountability_history_result = mysqli_query($conn, $accountability_history_query);
            if ($accountability_history_result) {
                echo '<script>
                window.location.href = "/asset_management/pages/accountability_forms.php";
                alert("Asset Deployed.")
            </script>';
            }
        }
    }
}
?>