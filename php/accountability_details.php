<?php
include 'db_conn.php';
include 'auto_redirect.php';

$accountability_data = "SELECT * FROM accountability_details";
$accountability_data_result = mysqli_query($conn, $accountability_data);

$pull_out_data = "SELECT * FROM pull_out_data";
$pull_out_data_result = mysqli_query($conn, $pull_out_data);

$accountability_history = "SELECT * FROM accountability_history";
$accountability_history_result = mysqli_query($conn, $accountability_history);

if (isset($_POST['asset_details_id'])) {
    $asset_details_id = $_POST['asset_details_id'];
    $stmt = $conn->prepare("SELECT * FROM accountability_details WHERE id = ?");
    $stmt->bind_param("s", $asset_details_id);

    // Execute the query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch data as associative array
        $row = $result->fetch_assoc();

        // Convert data to JSON format
        $json_response = json_encode($row);

        // Output JSON response
        header('Content-Type: application/json');
        echo $json_response;
    } else {
        // No data found for the provided serial number
        echo "No data found for the provided serial number.";
    }

    // Close statement
    $stmt->close();
}
if (isset($_POST['pull_out_button'])) {
    $accountability_id = $_POST['accountability_id'];
    $reason = $_POST['reason'];
    $asset_condition = $_POST['asset_condition'];
    $asset_id = $_POST['asset_id'];


    if ($user_branch === "Sucat") {
        $asset_location = "Sucat Warehouse";
    } else {
        $asset_location = "HO 2nd Flr";
    }
    $update_condition = "UPDATE inventory SET asset_location='$asset_location', asset_condition='$asset_condition', asset_status='Available' WHERE id = '$asset_id'";
    $update_condition = "UPDATE inventory SET asset_location='$asset_location', asset_condition='$asset_condition', asset_status='Available' WHERE id = '$asset_id'";
    $update_condition_result = mysqli_query($conn, $update_condition);


    if ($update_condition_result) {
        $get_data = "SELECT * FROM accountability_details WHERE id = '$accountability_id'";
        $get_data_result = mysqli_query($conn, $get_data);
        if ($get_data_result) {
            $get_data_row = mysqli_fetch_assoc($get_data_result);
            $asset_pull_out_query = "INSERT INTO pull_out_data(employee_number, asset_id, date_allocation, control_number, location, branch_encoded) 
                                VALUES ('" . $get_data_row['employee_number'] . "','" . $get_data_row['asset_id'] . "','" . $get_data_row['date_allocation'] . "','" . $get_data_row['control_number'] . "','" . $get_data_row['location'] . "','" . $get_data_row['branch_encoded'] . "')";
            $asset_pull_out_result = mysqli_query($conn, $asset_pull_out_query);
            $accountability_history_query = "INSERT INTO accountability_history (asset_id, employee_id, transaction, control_number, person_incharge, location) 
                                VALUES (
                                    '" . $get_data_row['asset_id'] . "', '" . $get_data_row['employee_number'] . "', 'Pull-Out', '" . $get_data_row['control_number'] . "', '" . $user_id . "', '" . $asset_location . "')";
            $accountability_history_result = mysqli_query($conn, $accountability_history_query);
            if ($accountability_history_result && $asset_pull_out_result) {
                $delete_data = "DELETE FROM accountability_details WHERE id = '$accountability_id'";
                $delete_data_result = mysqli_query($conn, $delete_data);
                echo '<script>
                window.location.href = "/asset_management/pages/tracking_records.php";
                alert("Asset Pulled Out.")
            </script>';
            }
        }
    }
}
?>