<?php
include ('db_conn.php');

// Query to get unique employee numbers
$employee_number_query = "SELECT DISTINCT employee_number FROM accountability_details";
$employee_number_result = mysqli_query($conn, $employee_number_query);

if ($employee_number_result) {
    while ($employee_number_data = mysqli_fetch_assoc($employee_number_result)) {
        // Query to get employee name
        $employee_name_query = "SELECT first_name, last_name FROM employee_data WHERE employee_number = ?";
        $employee_name_stmt = mysqli_prepare($conn, $employee_name_query);
        mysqli_stmt_bind_param($employee_name_stmt, "s", $employee_number_data['employee_number']);
        mysqli_stmt_execute($employee_name_stmt);
        mysqli_stmt_bind_result($employee_name_stmt, $first_name, $last_name);
        mysqli_stmt_fetch($employee_name_stmt);
        mysqli_stmt_close($employee_name_stmt);

        // Query to get control numbers for the employee
        $control_number_query = "SELECT DISTINCT control_number, date_allocation FROM accountability_details WHERE status = 'Deployed' AND employee_number = ?";
        $control_number_stmt = mysqli_prepare($conn, $control_number_query);
        mysqli_stmt_bind_param($control_number_stmt, "s", $employee_number_data['employee_number']);
        mysqli_stmt_execute($control_number_stmt);
        $control_number_result = mysqli_stmt_get_result($control_number_stmt);
        $num_rows = mysqli_num_rows($control_number_result);

        if ($num_rows > 0) {
            echo '<tr data-id="' . $employee_number_data['employee_number'] . '">';
            echo '<td colspan="4" style="font-weight:bold;">' . $first_name . ' ' . $last_name . '</td>';
            echo '</tr>'; // Close the first row

            // Open a new row for each control number
            while ($control_number_row = mysqli_fetch_assoc($control_number_result)) {
                echo '<tr data-id="' . $employee_number_data['employee_number'] . '">';
                echo '<td><p class="invisible">' . $first_name . ' ' . $last_name . '</p></td>';
                echo '<td class="controlNumber">' . $control_number_row['control_number'] . '</td>';
                echo '<td>' . date('F d, Y', strtotime($control_number_row['date_allocation'])) . '</td>';
                echo '<td>
                    <form method="POST" action="../pages/print_asset_form.php">
                        <input type="hidden" name="control_number" value="' . $control_number_row['control_number'] . '">
                        <button type="submit" name="print_data" class="edit-button btn btn-primary btn-sm" id="edit-button"><i class="fas fa-edit"></i></button>
                    </form>
                </td>';
                echo '</tr>'; // Close the row for each control number
            }
        }
    }
}
?>