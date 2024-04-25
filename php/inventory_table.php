<?php
// Include the database connection
include ('db_conn.php');

// Fetch all records from the database
$query = "SELECT DISTINCT asset_name FROM inventory ORDER BY date_time_encoded DESC";
$result = $conn->query($query);

// Check if there are any records
if ($result->num_rows > 0) {
    // Generate HTML for the table rows
    while ($row = $result->fetch_assoc()) {
        echo '<tr data-id="">';
        //' . $row['Row_ID'] . '
        echo '<td class="asset_name">' . $row['asset_name'] . '</td>';
        // Count Deployed items

        // Fetch the locations from the 'inventory' table where Item_Condition = 'Deployed'
        $queryLocations = "SELECT DISTINCT asset_location FROM inventory WHERE asset_status = 'Deployed'";
        $resultLocations = $conn->query($queryLocations);

        // Initialize an array to store the summary for each location
        $locationSummary = array();

        // Iterate over each location
        while ($locationRow = $resultLocations->fetch_assoc()) {
            $location = $locationRow['asset_location'];
            // Query to get the count of deployed units for the specific location
            $queryDeployed = "SELECT COUNT(*) AS DeployedCount FROM inventory WHERE asset_name = '{$row['asset_name']}' AND asset_status = 'Deployed' AND asset_location = '$location'";
            $resultDeployed = $conn->query($queryDeployed);
            $deployedCount = $resultDeployed->fetch_assoc()['DeployedCount'];

            // Check if the deployed count is greater than zero before adding to the summary
            if ($deployedCount > 0) {
                // Store the location and deployed count in the array
                $locationSummary[] = $location . ': ' . $deployedCount;
            }
        }

        // Concatenate the location summaries with a separator
        $summary = implode('<br>', $locationSummary);

        echo '<td class="Type">' . $summary . '</td>';
        // End of the summary



        // Count Available items

        // Fetch the locations from the 'inventory' table where Item_Condition = 'Available'
        $queryLocations = "SELECT DISTINCT asset_location FROM inventory WHERE asset_status = 'Available'";
        $resultLocations = $conn->query($queryLocations);

        // Initialize an array to store the summary for each location
        $locationSummary = array();

        // Iterate over each location
        while ($locationRow = $resultLocations->fetch_assoc()) {
            $location = $locationRow['asset_location'];
            // Query to get the count of available units for the specific location
            $queryAvailable = "SELECT COUNT(*) AS AvailableCount FROM inventory WHERE asset_name = '{$row['asset_name']}' AND asset_status = 'Available' AND asset_location = '$location'";
            $resultAvailable = $conn->query($queryAvailable);
            $availableCount = $resultAvailable->fetch_assoc()['AvailableCount'];

            // Check if the available count is greater than zero before adding to the summary
            if ($availableCount > 0) {
                // Store the location and available count in the array
                $locationSummary[] = $location . ': ' . $availableCount;
            }
        }

        // Concatenate the location summaries with a separator
        $summary = implode('<br>', $locationSummary);

        echo '<td class="Type">' . $summary . '</td>';
        // End of the summary



        // Fetch the locations from the 'inventory' table where Item_Condition = 'Disposed'
        $queryLocations = "SELECT DISTINCT asset_location FROM inventory WHERE asset_status = 'Disposal'";
        $resultLocations = $conn->query($queryLocations);

        // Initialize an array to store the disposed counts for each location
        $locationSummary = array();

        // Iterate over each location
        while ($locationRow = $resultLocations->fetch_assoc()) {
            $location = $locationRow['asset_location'];
            // Query to get the count of disposed units for the specific location
            $queryDisposed = "SELECT COUNT(*) AS DisposedCount FROM inventory WHERE asset_name = '{$row['asset_name']}' AND asset_status = 'Disposal' AND asset_location = '$location'";
            $resultDisposed = $conn->query($queryDisposed);
            $disposedCount = $resultDisposed->fetch_assoc()['DisposedCount'];

            // Check if the count is greater than zero before adding to the summary
            if ($disposedCount > 0) {
                // Store the location and disposed count in the summary array
                $locationSummary[] = $location . ': ' . $disposedCount;
            }
        }

        // Concatenate the location summaries with a separator
        $summary = implode('<br>', $locationSummary);

        echo '<td class="Type">' . $summary . '</td>';
        //end of the disposed

        $queryDisposedS = "SELECT COUNT(*) AS DisposedCount FROM inventory WHERE asset_name = '{$row['asset_name']}'";
        $resultDisposedS = $conn->query($queryDisposedS);
        $disposedCountS = $resultDisposedS->fetch_assoc()['DisposedCount'];
        echo '<td class="Type">' . $disposedCountS . '</td>';

        echo '</tr>';
    }
} else {
    // No records found
    echo '<tr><td colspan="15">No records found.</td></tr>';
}
?>