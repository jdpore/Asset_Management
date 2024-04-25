<?php
include '../php/field_list.php';
include '../php/inventory_list.php';
include '../php/employee_list.php';
include '../php/add.php';
include '../php/edit.php';
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
                    <div class="col-6">
                        <h1>Accountability</h1>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-tool" data-bs-toggle="modal"
                            data-bs-target="#add_asset_modal">
                            <i class="lni lni-plus"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php' ?>
                    </div>
                </div>
                <div class="modal fade" id="add_asset_modal" tabindex="-1" aria-labelledby="add_asset_modal_label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_asset_modal_label">Assign Asset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="" onsubmit="return isValid()" method="POST">
                                    <!-- Employee select dropdown -->
                                    <div class="form-floating col-md-12 mb-2">
                                        <select class="form-select" name="accountable_employee_number">
                                            <option disabled selected value="">Select Employee Name...</option>
                                            <?php foreach ($employee_data_result as $employee_data_result_row) {
                                                // Check if the current employee_number exists in user_data table
                                                $employee_number = $employee_data_result_row['employee_number']; ?>
                                                <option value="<?php echo $employee_number ?>">
                                                    <?php echo $employee_data_result_row['first_name'], " ", $employee_data_result_row['last_name'], " - ", $employee_data_result_row['branch'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="accountable_employee_number">Employee
                                            Name</label>
                                    </div>
                                    <!-- Asset select dropdown -->
                                    <div class="form-floating col-md-12 mb-2">
                                        <select class="form-select" name="asset" id="asset" onchange="updateTable()">
                                            <option disabled selected value="">Select Asset...</option>
                                            <?php foreach ($inventory_available_result as $inventory_available_result_row) { ?>
                                                <option
                                                    value="<?php echo $inventory_available_result_row['id'] ?>">
                                                    <?php echo $inventory_available_result_row['asset_name'], ' ', $inventory_available_result_row['asset_sticker_number'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="asset">Asset</label>
                                    </div>
                                    <!-- Table to display selected asset -->
                                    <div class="form-floating col-md-12 mb-2 overflow-auto" style="max-height: 30vh">
                                        <table id="table-selected" class="table table-borderless table-striped">
                                            <thead class="sticky">
                                                <tr>
                                                    <th scope="col">Asset</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-body">
                                                <!-- Selected asset will be displayed here -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="hidden" id="selected_assets_input" name="selected_assets_input">
                                    <!-- Submit button -->
                                    <div class="col-md-12 mt-5">
                                        <button id="assign_asset_button" name="assign_asset_button" type="submit"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-75 overflow-auto">
                    <div class="col-12">
                        <table id="table" class="table table-bordered table-striped">
                            <thead class="sticky">
                                <tr>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Control Number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../php/accountability_table.php'; ?>
                            </tbody>
                        </table>
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
        // Global array variable to store selected assets
        var selectedAssets = [];

        // JavaScript function to update the table with the selected asset
        function updateTable() {
            var selectedAsset = document.getElementById('asset').value; // Get the selected asset value
            var tableBody = document.getElementById('table-body'); // Get the table body

            // If the selected asset is not empty and it's not already selected
            if (selectedAsset.trim() !== '' && !selectedAssets.includes(selectedAsset)) {
                // Get the selected asset name and description from the selected option
                var assetName = document.getElementById('asset').options[document.getElementById('asset').selectedIndex].text;
                // Add the selected asset to the array
                selectedAssets.push(selectedAsset);
                // Create a delete button for removing the asset from the table
                var deleteButton = '<button type="button" class="btn btn-danger btn-sm" onclick="removeAsset(this)"><i class="lni lni-trash-can"></i></button>';
                // Create a new table row
                var newRow = document.createElement('tr');
                // Set the HTML content of the new row with asset name, description, and delete button
                newRow.innerHTML = '<td>' + assetName + '</td><td>' + deleteButton + '</td>';
                // Append the new row to the table body
                tableBody.appendChild(newRow);
                // Set the selected assets array in the hidden input field
                document.getElementById('selected_assets_input').value = JSON.stringify(selectedAssets);
                document.getElementById('asset').value = '';
            }
        }

        // Function to remove the asset from the table and array
        function removeAsset(button) {
            var row = button.parentNode.parentNode; // Get the table row containing the button
            // Get the index of the table row
            var index = Array.prototype.indexOf.call(row.parentNode.children, row);
            // Remove the selected asset from the array
            selectedAssets.splice(index, 1);
            row.parentNode.removeChild(row); // Remove the row from the table
            // Set the updated selected assets array in the hidden input field
            document.getElementById('selected_assets_input').value = JSON.stringify(selectedAssets);
        }
    </script>


</body>

</html>