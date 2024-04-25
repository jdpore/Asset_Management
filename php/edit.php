<?php
include 'db_conn.php';
include 'auto_redirect.php';

if (isset ($_POST['edit_employee_button'])) {
    $edit_id_number = $_POST['edit_id_number'];
    $edit_employee_number = $_POST['edit_employee_number'];
    $edit_email = $_POST['edit_email'];
    $edit_last_name = $_POST['edit_last_name'];
    $edit_first_name = $_POST['edit_first_name'];
    $edit_department = $_POST['edit_department'];
    $edit_branch = $_POST['edit_branch'];
    $edit_location = $_POST['edit_location'];
    $edit_designation = $_POST['edit_designation'];

    $edit_employee_query = "UPDATE employee_data
                            SET
                                employee_number = '$edit_employee_number',
                                email = '$edit_email',
                                last_name = '$edit_last_name',
                                first_name = '$edit_first_name',
                                department = '$edit_department',
                                branch = '$edit_branch',
                                location = '$edit_location',
                                designation = '$edit_designation'
                            WHERE
                                id = '$edit_id_number';";

    $edit_employee_result = mysqli_query($conn, $edit_employee_query);
    if ($edit_employee_result) {
        $transaction = "Edited Employee: $edit_employee_number";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            echo '<script>
                window.location.href = "/asset_management/pages/employee_data.php";
                alert("Edited Employee.")
            </script>';
        }
    }
}

if (isset ($_POST['edit_asset_button'])) {
    $edit_id = $_POST['edit_id'];
    $edit_asset_serial_number = $_POST['edit_asset_serial_number'];
    $edit_asset_number = $_POST['edit_asset_number'];
    $edit_asset_sticker_number = $_POST['edit_asset_sticker_number'];
    $edit_asset_name = $_POST['edit_asset_name'];
    $edit_asset_date_acquired = $_POST['edit_asset_date_acquired'];
    $edit_asset_type = $_POST['edit_asset_type'];
    $edit_asset_category = $_POST['edit_asset_category'];
    $edit_asset_status = $_POST['edit_asset_status'];
    $edit_asset_condition = $_POST['edit_asset_condition'];
    $edit_asset_brand_model = $_POST['edit_asset_model'];
    $edit_asset_processor = "N/A";
    $edit_asset_operating_system = "N/A";
    $edit_asset_storage = "N/A";
    $edit_asset_ram = "N/A";
    $edit_asset_description = $_POST['edit_asset_description'];

    if ($edit_asset_category == "Unit") {
        $edit_asset_processor = $_POST['edit_asset_processor'];
        $edit_asset_operating_system = $_POST['edit_asset_operating_system'];
        $edit_asset_storage = $_POST['edit_asset_storage'];
        $edit_asset_ram = $_POST['edit_asset_ram'];
    }

    $edit_asset_query = "UPDATE inventory
                            SET
                                asset_number = '$edit_asset_number',
                                asset_name = '$edit_asset_name',
                                asset_type = '$edit_asset_type',
                                asset_category = '$edit_asset_category',
                                asset_sticker_number = '$edit_asset_sticker_number',
                                asset_status = '$edit_asset_status',
                                asset_condition = '$edit_asset_condition',
                                asset_description = '$edit_asset_description',
                                asset_acquired_date = '$edit_asset_date_acquired',
                                asset_brand_model = '$edit_asset_brand_model',
                                asset_processor = '$edit_asset_processor',
                                asset_storage = '$edit_asset_storage',
                                asset_ram = '$edit_asset_ram',
                                asset_operating_system = '$edit_asset_operating_system',
                                asset_branch = '$user_branch',
                                asset_location = '$user_location'
                            WHERE
                                id = '$edit_id';";

    $edit_asset_result = mysqli_query($conn, $edit_asset_query);
    if ($edit_asset_result) {
        $transaction = "Edited Asset: $edit_asset_sticker_number";
        $history_query = "INSERT INTO logs (transaction, person_incharge) VALUES ('$transaction','$user_full_name')";
        $history_result = mysqli_query($conn, $history_query);
        if ($history_result) {
            echo '<script>
                window.location.href = "/asset_management/pages/asset_management.php";
                alert("Edited Asset.")
            </script>';
        }
    }
}
?>