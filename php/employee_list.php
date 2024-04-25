<?php
include 'db_conn.php';
include 'auto_redirect.php';

$employee_data = "SELECT * FROM employee_data";
$employee_data_result = mysqli_query($conn, $employee_data);

if ($user_branch != "Head Office") {
    $assign_asset_employee_data = "SELECT * FROM employee_data WHERE branch NOT LIKE '%Head Office%'";
    $assign_asset_employee_data_result = mysqli_query($conn, $employee_data);
} else {
    $assign_asset_employee_data = "SELECT * FROM employee_data WHERE branch LIKE '%Head Office%'";
    $assign_asset_employee_data_result = mysqli_query($conn, $employee_data);
}

$user_data = "SELECT * FROM user_data";
$user_data_result = mysqli_query($conn, $user_data);

if (isset ($_POST['edit_employee_id'])) {
    $edit_employee_id = $_POST['edit_employee_id'];
    $stmt = $conn->prepare("SELECT * FROM employee_data WHERE id = ?");
    $stmt->bind_param("s", $edit_employee_id);

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
} else {
}
?>