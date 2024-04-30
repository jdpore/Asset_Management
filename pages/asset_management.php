<?php
include '../php/field_list.php';
include '../php/inventory_list.php';
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
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-5" style="height: 100vh">
            <div class="container-fluid shadow-lg bg-body rounded p-5 h-100">
                <div class="border-bottom row align-items-center mb-5 py-3">
                    <div class="col-6">
                        <h1>Assets</h1>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-tool" data-bs-toggle="modal"
                            data-bs-target="#add_asset_modal">
                            <i class="lni lni-plus"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php'; ?>
                    </div>
                </div>
                <div class="modal fade" id="add_asset_modal" tabindex="-1" aria-labelledby="add_asset_modal_label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_asset_modal_label">Add Asset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="../php/add.php" onsubmit="return isValid()" method="POST">
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="asset_serial_number"
                                            placeholder="Serial Number" required>
                                        <label class="ms-2 form-control-placeholder" for="asset_serial_number">Serial
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="asset_number"
                                            placeholder="Asset Number">
                                        <label class="ms-2 form-control-placeholder" for="asset_number">Asset
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="asset_sticker_number"
                                            placeholder="Sticker Number" required>
                                        <label class="ms-2 form-control-placeholder" for="asset_sticker_number">Sticker
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="asset_name"
                                            placeholder="Asset Name" required>
                                        <label class="ms-2 form-control-placeholder" for="asset_name">Asset Name</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="date" class="form-control" name="asset_date_acquired"
                                            placeholder="Date Acquired" required>
                                        <label class="ms-2 form-control-placeholder" for="asset_date_acquired ">Date
                                            Acquired</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="asset_type" required>
                                            <option disabled selected value="">Select Type...</option>
                                            <option value="Office Equipment">Office Equipment</option>
                                            <option value="Stocks">Stocks</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="asset_type">Type</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="asset_category"
                                            onchange="toggleFields(this.value)" required>
                                            <option disabled selected value="">Select Category...</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Peripherals">Peripherals</option>
                                            <option value="Accessories">Accessories</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="asset_category">Category</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <select class="form-select" name="asset_condition" required>
                                            <option disabled selected value="">Select Condition...</option>
                                            <option value="Brand New">Brand New</option>
                                            <option value="Working-Good Condition">Working-Good Condition</option>
                                            <option value="Working-Fair Condition">Working-Fair Condition</option>
                                            <option value="Working-poor Condition">Working-poor Condition</option>
                                            <option value="Defect">Defect</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="asset_condition">Condition</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <select class="form-select" name="asset_status" required>
                                            <option disabled selected value="">Select Status...</option>
                                            <option value="Available">Available</option>
                                            <option value="Disposed">Disposed</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="asset_status">Status</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="asset_model"
                                            placeholder="Brand/Model" required>
                                        <label class="ms-2 form-control-placeholder"
                                            for="asset_model">Brand/Model</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="asset_processor"
                                            id="asset_processor" placeholder="Processor" disabled>
                                        <label class="ms-2 form-control-placeholder"
                                            for="asset_processor">Processor</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="asset_operating_system"
                                            id="asset_operating_system" placeholder="Operating System" disabled>
                                        <label class="ms-2 form-control-placeholder"
                                            for="asset_operating_system">Operating
                                            System</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="asset_storage" id="asset_storage"
                                            placeholder="Storage" disabled>
                                        <label class="ms-2 form-control-placeholder" for="asset_storage">Storage</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="asset_ram" id="asset_ram"
                                            placeholder="RAM Capacity" disabled>
                                        <label class="ms-2 form-control-placeholder" for="asset_ram">RAM
                                            Capacity</label>
                                    </div>
                                    <div class="form-floating col-md-12 mb-2">
                                        <textarea class="form-control" name="asset_description" id="asset_description"
                                            placeholder="Description" required></textarea>
                                        <label class="form-label ms-2" for="asset_description">Description</label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="add_asset_button" name="add_asset_button" type="submit"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit_asset_modal" tabindex="-1" aria-labelledby="edit_asset_modal_label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit_asset_modal_label">Edit Asset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="../php/edit.php" onsubmit="return isValid()"
                                    method="POST">
                                    <input type="hidden" class="form-control" name="edit_id" required>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_serial_number"
                                            placeholder="Serial Number" required>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_serial_number">Serial
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_number"
                                            placeholder="Asset Number">
                                        <label class="ms-2 form-control-placeholder" for="edit_asset_number">Asset
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_sticker_number"
                                            placeholder="Sticker Number" required>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_sticker_number">Sticker
                                            Number</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_name"
                                            placeholder="Asset Name" required>
                                        <label class="ms-2 form-control-placeholder" for="edit_asset_name">Asset
                                            Name</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="date" class="form-control" name="edit_asset_date_acquired"
                                            placeholder="Date Acquired" required>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_date_acquired ">Date
                                            Acquired</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="edit_asset_type" required>
                                            <option disabled selected value="">Select Type...</option>
                                            <option value="Office Equipment">Office Equipment</option>
                                            <option value="Stocks">Stocks</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="edit_asset_type">Type</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="edit_asset_category"
                                            onchange="editToggleFields(this.value)" required>
                                            <option disabled selected value="">Select Category...</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Peripherals">Peripherals</option>
                                            <option value="Accessories">Accessories</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_category">Category</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <select class="form-select" name="edit_asset_condition" required>
                                            <option disabled selected value="">Select Condition...</option>
                                            <option value="Brand New">Brand New</option>
                                            <option value="Working-Good Condition">Working-Good Condition</option>
                                            <option value="Working-Fair Condition">Working-Fair Condition</option>
                                            <option value="Working-poor Condition">Working-poor Condition</option>
                                            <option value="Defect">Defect</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_condition">Condition</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <select class="form-select" name="edit_asset_status" required>
                                            <option disabled selected value="">Select Status...</option>
                                            <option value="Available">Available</option>
                                            <option value="Disposed">Disposed</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_status">Status</label>
                                    </div>
                                    <div class="form-floating col-md-4 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_model"
                                            placeholder="Brand/Model" required>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_model">Brand/Model</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_processor"
                                            id="edit_asset_processor" placeholder="Processor" disabled>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_processor">Processor</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_operating_system"
                                            id="edit_asset_operating_system" placeholder="Operating System" disabled>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_operating_system">Operating
                                            System</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_storage"
                                            id="edit_asset_storage" placeholder="Storage" disabled>
                                        <label class="ms-2 form-control-placeholder"
                                            for="edit_asset_storage">Storage</label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_asset_ram"
                                            id="edit_asset_ram" placeholder="RAM Capacity" disabled>
                                        <label class="ms-2 form-control-placeholder" for="edit_asset_ram">RAM
                                            Capacity</label>
                                    </div>
                                    <div class="form-floating col-md-12 mb-2">
                                        <textarea class="form-control" name="edit_asset_description"
                                            id="edit_asset_description" placeholder="Description" required></textarea>
                                        <label class="form-label ms-2" for="edit_asset_description">Description</label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="edit_asset_button" name="edit_asset_button" type="submit"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-75 overflow-auto">
                    <div class="col-12">
                        <table id="table" class="table table-borderless table-striped">
                            <thead class="sticky">
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Types</th>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Date Acquired</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($inventory_result as $inventory_result_row) {
                                    echo '<tr>';
                                    echo '<td>
                                            <button type="button" class="btn btn-success btn-sm" onclick="edit_asset(\'' . $inventory_result_row['id'] . '\')" data-bs-toggle="modal"
                                                data-bs-target="#edit_asset_modal">
                                                <i class="lni lni-pencil"></i>
                                            </button>
                                            <a href="../php/delete.php?delete_asset=' . $inventory_result_row['id'] . '" onclick="return confirm(\'Delete asset?\')" class="btn btn-danger btn-sm">
                                                <i class="lni lni-trash-can"></i>
                                            </a>
                                        </td>';
                                    echo "<td>" . $inventory_result_row['asset_name'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>Type:</strong><br>" . $inventory_result_row['asset_type'] . "<br><strong style='font-size: 0.8em;'>Category:</strong><br>" . $inventory_result_row['asset_category'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>AN:</strong><br>" . $inventory_result_row['asset_number'] . "<br><strong style='font-size: 0.8em;'>StN:</strong><br>" . $inventory_result_row['asset_sticker_number'] . "<br><strong style='font-size: 0.8em;'>SN:</strong><br>" . $inventory_result_row['asset_serial_number'] . "</td>";
                                    echo "<td>" . $inventory_result_row['asset_description'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>Availability:</strong><br>" . $inventory_result_row['asset_status'] . "<br><strong style='font-size: 0.8em;'>Condition:</strong><br>" . $inventory_result_row['asset_condition'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>OS:</strong><br>" . $inventory_result_row['asset_operating_system'] . "<br><strong style='font-size: 0.8em;'>Processor:</strong><br>" . $inventory_result_row['asset_processor'] . "<br><strong style='font-size: 0.8em;'>RAM:</strong><br>" . $inventory_result_row['asset_ram'] . "<br><strong style='font-size: 0.8em;'>Capacity:</strong><br>" . $inventory_result_row['asset_storage'] . "</td>";
                                    echo "<td>" . $inventory_result_row['asset_brand_model'] . "</td>";
                                    echo "<td><strong style='font-size: 0.8em;'>Branch:</strong><br>" . $inventory_result_row['asset_branch'] . "<br><strong style='font-size: 0.8em;'>Location:</strong><br>" . $inventory_result_row['asset_location'] . "</td>";
                                    echo "<td>" . $inventory_result_row['asset_acquired_date'] . "</td>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/search.js"></script>
    <script>
        var edit_processor = document.getElementById('edit_asset_processor');
        var edit_storage = document.getElementById('edit_asset_storage');
        var edit_ram = document.getElementById('edit_asset_ram');
        var edit_operating_system = document.getElementById('edit_asset_operating_system');
        function edit_asset(id) {
            // Prevent the default form submission
            event.preventDefault();

            // Fetch data from the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/inventory_list.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the JSON response
                    var assetData = JSON.parse(xhr.responseText);
                    if (assetData.asset_category == "Unit") {
                        edit_processor.removeAttribute('disabled');
                        edit_storage.removeAttribute('disabled');
                        edit_ram.removeAttribute('disabled');
                        edit_operating_system.removeAttribute('disabled');
                        document.querySelector('input[name="edit_asset_processor"]').value = assetData.asset_processor;
                        document.querySelector('input[name="edit_asset_operating_system"]').value = assetData.asset_operating_system;
                        document.querySelector('input[name="edit_asset_storage"]').value = assetData.asset_storage;
                        document.querySelector('input[name="edit_asset_ram"]').value = assetData.asset_ram;
                    } else {
                        edit_processor.setAttribute('disabled', true);
                        edit_storage.setAttribute('disabled', true);
                        edit_ram.setAttribute('disabled', true);
                        edit_operating_system.setAttribute('disabled', true);
                    }

                    // Populate the form fields with the retrieved data
                    document.querySelector('input[name="edit_id"]').value = assetData.id;
                    document.querySelector('input[name="edit_asset_serial_number"]').value = assetData.asset_serial_number;
                    document.querySelector('input[name="edit_asset_number"]').value = assetData.asset_number;
                    document.querySelector('input[name="edit_asset_sticker_number"]').value = assetData.asset_sticker_number;
                    document.querySelector('input[name="edit_asset_name"]').value = assetData.asset_name;
                    document.querySelector('input[name="edit_asset_date_acquired"]').value = assetData.asset_acquired_date;
                    document.querySelector('select[name="edit_asset_type"]').value = assetData.asset_type;
                    document.querySelector('select[name="edit_asset_category"]').value = assetData.asset_category;
                    document.querySelector('select[name="edit_asset_condition"]').value = assetData.asset_condition;
                    document.querySelector('select[name="edit_asset_status"]').value = assetData.asset_status;
                    document.querySelector('input[name="edit_asset_model"]').value = assetData.asset_brand_model;
                    document.querySelector('textarea[name="edit_asset_description"]').value = assetData.asset_description;
                    // Populate other fields as needed
                }
            };
            xhr.send('id=' + encodeURIComponent(id));
        }
        function editToggleFields(category) {
            edit_processor.removeAttribute('disabled');
            edit_storage.removeAttribute('disabled');
            edit_ram.removeAttribute('disabled');
            edit_operating_system.removeAttribute('disabled');
            if (category == "Unit") {
                edit_processor.removeAttribute('disabled');
                edit_storage.removeAttribute('disabled');
                edit_ram.removeAttribute('disabled');
                edit_operating_system.removeAttribute('disabled');
            } else {
                edit_processor.setAttribute('disabled', true);
                edit_storage.setAttribute('disabled', true);
                edit_ram.setAttribute('disabled', true);
                edit_operating_system.setAttribute('disabled', true);
            }
        }

        function toggleFields(category) {
            var processor = document.getElementById('asset_processor');
            var storage = document.getElementById('asset_storage');
            var ram = document.getElementById('asset_ram');
            var operating_system = document.getElementById('asset_operating_system');
            if (category === 'Unit') {
                processor.removeAttribute('disabled');
                storage.removeAttribute('disabled');
                ram.removeAttribute('disabled');
                operating_system.removeAttribute('disabled');
            } else {
                processor.setAttribute('disabled', true);
                storage.setAttribute('disabled', true);
                ram.setAttribute('disabled', true);
                operating_system.setAttribute('disabled', true);
            }
        }
    </script>
</body>

</html>