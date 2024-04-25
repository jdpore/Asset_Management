<?php
include '../php/inventory_list.php';
include '../php/add.php';
include '../php/accountability_details.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/table.css">
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* For Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        @keyframes revealDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        .main {
            animation: revealDown 0.5s ease-in-out;
        }

        .table td,
        .table th {
            text-align: start;
            margin-top: 0%;
            white-space: nowrap;
            background-color: white;
            padding-top: 25px;
            padding-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-5" style="height: 100vh">
            <div class="container-fluid shadow-lg bg-body rounded p-5 h-100">
                <div class="border-bottom row align-items-center mb-5 py-3">
                    <div class="col-10">
                        <h1>Assets</h1>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php' ?>
                    </div>
                </div>

                <div class="row h-75 overflow-auto">
                    <div class="col-12">
                        <table id="table" class="table table-borderless table-striped">
                            <thead class="sticky">
                                <tr>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Pull Out Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                        $control_number_query = "SELECT DISTINCT date_pull_out FROM pull_out_data WHERE employee_number = ?";
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
                                                echo '<td>' . date('F d, Y', strtotime($control_number_row['date_pull_out'])) . '</td>';
                                                echo '<td>
                                                        <form method="POST" action="../pages/pull_out_form.php">
                                                            <input type="hidden" name="date_pull_out" value="' . $control_number_row['date_pull_out'] . '">
                                                            <button type="submit" name="print_pull_out" class="edit-button btn btn-primary btn-sm" id="edit-button"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                    </td>';
                                                echo '</tr>'; // Close the row for each control number
                                            }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/search.js"></script>
    <script>
        function pull_out(id) {
            event.preventDefault();

            // Fetch data from the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/accountability_details.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the JSON response
                    var asset_data = JSON.parse(xhr.responseText);
                    document.querySelector('#accountability_id').value = asset_data.id;
                    document.querySelector('#asset_id').value = asset_data.asset_id;
                    document.querySelector('#employee_number').value = asset_data.employee_number;
                    document.querySelector('#control_number').value = asset_data.control_number;
                    document.querySelector('#asset_sticker_number').value = asset_data.asset_sticker_number;
                }
            };
            xhr.send('asset_details_id=' + encodeURIComponent(id));
        }
    </script>
</body>

</html>