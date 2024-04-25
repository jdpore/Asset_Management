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
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col">Form Control Number</th>
                                    <th scope="col">Asset Condition</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($accountability_data_result as $accountability_data_row) {
                                    $accountable_employee_name = "SELECT * FROM employee_data WHERE employee_number = '" . $accountability_data_row['employee_number'] . "'";
                                    $accountable_employee_name_result = mysqli_query($conn, $accountable_employee_name);
                                    $accountable_employee_name_row = mysqli_fetch_assoc($accountable_employee_name_result);

                                    $asset_name = "SELECT * FROM inventory WHERE id = '" . $accountability_data_row['asset_id'] . "'";
                                    $asset_name_result = mysqli_query($conn, $asset_name);
                                    $asset_name_row = mysqli_fetch_assoc($asset_name_result);

                                    echo '<tr>';
                                    echo "<td>" . $accountable_employee_name_row['first_name'] . " " . $accountable_employee_name_row['last_name'] . "</td>";
                                    echo "<td>" . $asset_name_row['asset_name'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>Category: </strong>" . $asset_name_row['asset_category'] . "<br><strong style='font-size: 0.8em;'>OS: </strong>" . $asset_name_row['asset_operating_system'] . "<br><strong style='font-size: 0.8em;'>Capacity: </strong>" . $asset_name_row['asset_storage'] . "<br><strong style='font-size: 0.8em;'>Version: </strong>" . $asset_name_row['asset_brand_model'] . "</td>";
                                    echo "<td>" . $accountability_data_row['control_number'] . "</td>";
                                    echo "<td>" . $asset_name_row['asset_condition'] . "</td>";
                                    echo "<td>" . $asset_name_row['asset_location'] . "</td>";
                                    echo '<td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#pull_out_modal" onclick="pull_out(\'' . $accountability_data_row['id'] . '\')">
                                                <i class="lni lni-arrow-right"></i>
                                            </button></td>';

                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="pull_out_modal" tabindex="-1" aria-labelledby="pull_out_modal_label"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pull_out_modal_label">Pull Out</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form class="row g-3" action="../php/accountability_details.php" method="POST">
                                            <div class="form-floating col-md-12 mb-2">
                                                <input type="hidden" name="accountability_id" id="accountability_id">
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <input type="hidden" name="asset_id" id="asset_id">
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <input type="text" class="form-control" name="employee_number"
                                                    id="employee_number" placeholder="Employee Number">
                                                <label class="ms-2 form-control-placeholder" for="employee_number">
                                                    Employee Number </label>
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <input type="text" class="form-control" name="control_number"
                                                    id="control_number" placeholder="Control Number">
                                                <label class="ms-2 form-control-placeholder" for="control_number">
                                                    Control Number</label>
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <input type="text" class="form-control" name="asset_sticker_number"
                                                    id="asset_sticker_number">
                                                <label class="ms-2 form-control-placeholder" for="asset_sticker_number">
                                                    Asset Sticker Number</label>
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <select class="form-select" name="asset_condition" id="asset_condition">
                                                    <option disabled selected value="">Condition...</option>
                                                    <option value="Brand New">Brand New</option>
                                                    <option value="Working-Good Condition">Working-Good Condition
                                                    </option>
                                                    <option value="Working-Fair Condition">Working-Fair Condition
                                                    </option>
                                                    <option value="Working-poor Condition">Working-poor Condition
                                                    </option>
                                                    <option value="Defect">Defect</option>
                                                </select>
                                                <label class="ms-2 form-control-placeholder" for="asset_condition">
                                                    Asset Condition </label>
                                            </div>
                                            <div class="form-floating col-md-12 mb-2">
                                                <textarea class="form-control" name="reason" id="reason" cols="30"
                                                    rows="10" placeholder="Reason"></textarea>
                                                <label class="ms-2 form-control-placeholder" for="reason">
                                                    Reason for pull-out</label>
                                            </div>

                                            <div class="col-md-12 mt-5">
                                                <button id="pull_out_button" name="pull_out_button" type="submit"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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