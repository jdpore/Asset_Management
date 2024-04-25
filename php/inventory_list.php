<?php
include 'db_conn.php';
include 'auto_redirect.php';

$inventory_query = "SELECT * FROM inventory";
$inventory_result = mysqli_query($conn, $inventory_query);

$inventory_available_query = "SELECT * FROM inventory WHERE asset_status = 'Available'";
$inventory_available_result = mysqli_query($conn, $inventory_available_query);

$deployed_count_query = "SELECT COUNT(*) AS deployed_count FROM inventory WHERE asset_status = 'Deployed'";
$deployed_count_result = mysqli_query($conn, $deployed_count_query);
$deployed_count_row = mysqli_fetch_assoc($deployed_count_result);

$available_count_query = "SELECT COUNT(*) AS available_count FROM inventory WHERE asset_status = 'Available'";
$available_count_result = mysqli_query($conn, $available_count_query);
$available_count_row = mysqli_fetch_assoc($available_count_result);

$disposal_count_query = "SELECT COUNT(*) AS disposal_count FROM inventory WHERE asset_status = 'Disposal'";
$disposal_count_result = mysqli_query($conn, $disposal_count_query);
$disposal_count_row = mysqli_fetch_assoc($disposal_count_result);

if (isset ($_POST['asset_sticker_number'])) {
    $asset_sticker_number = $_POST['asset_sticker_number'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE asset_sticker_number = ?");
    $stmt->bind_param("s", $asset_sticker_number);

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