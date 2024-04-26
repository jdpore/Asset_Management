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
                                    <th scope="col">Asset</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col">Transaction</th>
                                    <th scope="col">Person Involved</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Date of Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($accountability_history_result as $accountability_history_row) {
                                    $accountable_employee_name = "SELECT * FROM employee_data WHERE employee_number = '" . $accountability_history_row['employee_id'] . "'";
                                    $accountable_employee_name_result = mysqli_query($conn, $accountable_employee_name);
                                    $accountable_employee_name_row = mysqli_fetch_assoc($accountable_employee_name_result);

                                    $asset_name = "SELECT * FROM inventory WHERE id = '" . $accountability_history_row['asset_id'] . "'";
                                    $asset_name_result = mysqli_query($conn, $asset_name);
                                    $asset_name_row = mysqli_fetch_assoc($asset_name_result);
                                    echo '<tr>';
                                    echo "<td>" . $asset_name_row['asset_name'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>Category: </strong>" . $asset_name_row['asset_category'] . "<br><strong style='font-size: 0.8em;'>OS: </strong>" . $asset_name_row['asset_operating_system'] . "<br><strong style='font-size: 0.8em;'>Capacity: </strong>" . $asset_name_row['asset_storage'] . "<br><strong style='font-size: 0.8em;'>Version: </strong>" . $asset_name_row['asset_brand_model'] . "</td>";
                                    echo "<td>" . $accountability_history_row['transaction'] . "<br><br><strong style='font-size: 0.8em;'>Control Number:</strong><br>" . $accountability_history_row['control_number'] . "</td>";
                                    echo "<td>" . $accountable_employee_name_row['first_name'] . " " . $accountable_employee_name_row['last_name'] . "</td>";
                                    echo "<td>" . $asset_name_row['asset_condition'] . "</td>";
                                    echo "<td>" . $asset_name_row['asset_location'] . "</td>";
                                    echo '</tr>';
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
</body>

</html>