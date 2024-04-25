<?php
include '../php/field_list.php';
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
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-5" style="height: 100vh">
            <div class="container-fluid shadow-lg bg-body rounded p-5 h-100">
                <div class="border-bottom row align-items-center mb-5 py-3">
                    <div class="col-6">
                        <h1>Employees</h1>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-tool" data-bs-toggle="modal"
                            data-bs-target="#add_user_modal">
                            <i class="lni lni-plus"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php' ?>
                    </div>
                </div>
                <div class="modal fade" id="add_user_modal" tabindex="-1" aria-labelledby="add_user_modal_label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_user_modal_label">Add Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="" onsubmit="return isValid()" method="POST">
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="employee_number"
                                            placeholder="Employee Number">
                                        <label class="ms-2 form-control-placeholder" for="employee_number">
                                            Employee Number </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <label class="ms-2 form-control-placeholder" for="email">
                                            Email </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Last Name">
                                        <label class="ms-2 form-control-placeholder" for="last_name">
                                            Last Name </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="First Name">
                                        <label class="ms-2 form-control-placeholder" for="first_name">
                                            First Name </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="department">
                                            <option disabled selected value="">Select Department...</option>
                                            <?php foreach ($department_result as $department_result_row) { ?>
                                                <option value="<?php echo $department_result_row['category_name'] ?>">
                                                    <?php echo $department_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="department">
                                            Department </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="branch">
                                            <option disabled selected value="">Select Branch...</option>
                                            <?php foreach ($branch_result as $branch_result_row) { ?>
                                                <option value="<?php echo $branch_result_row['category_name'] ?>">
                                                    <?php echo $branch_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="branch">
                                            Branch </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="location">
                                            <option disabled selected value="">Select Location...</option>
                                            <?php foreach ($location_result as $location_result_row) { ?>
                                                <option value="<?php echo $location_result_row['category_name'] ?>">
                                                    <?php echo $location_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="location">
                                            Location </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="designation"
                                            placeholder="Designation">
                                        <label class="ms-2 form-control-placeholder" for="designation">
                                            Designation </label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="add_employee_button" name="add_employee_button" type="submit"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit_employee_modal" tabindex="-1"
                    aria-labelledby="edit_employee_modal_label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit_employee_modal_label">Edit Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="" onsubmit="return isValid()" method="POST">
                                    <input type="hidden" class="form-control" name="edit_id_number">
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_employee_number"
                                            placeholder="Employee Number">
                                        <label class="ms-2 form-control-placeholder" for="edit_employee_number">
                                            Employee Number </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="email" class="form-control" name="edit_email" placeholder="Email">
                                        <label class="ms-2 form-control-placeholder" for="edit_email">
                                            Email </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_last_name"
                                            placeholder="Last Name">
                                        <label class="ms-2 form-control-placeholder" for="edit_last_name">
                                            Last Name </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_first_name"
                                            placeholder="First Name">
                                        <label class="ms-2 form-control-placeholder" for="edit_first_name">
                                            First Name </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="edit_department">
                                            <option disabled selected value="">Select Department...</option>
                                            <?php foreach ($department_result as $department_result_row) { ?>
                                                <option value="<?php echo $department_result_row['category_name'] ?>">
                                                    <?php echo $department_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="edit_department">
                                            Department </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="edit_branch">
                                            <option disabled selected value="">Select Branch...</option>
                                            <?php foreach ($branch_result as $branch_result_row) { ?>
                                                <option value="<?php echo $branch_result_row['category_name'] ?>">
                                                    <?php echo $branch_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="edit_branch">
                                            Branch </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <select class="form-select" name="edit_location">
                                            <option disabled selected value="">Select Location...</option>
                                            <?php foreach ($location_result as $location_result_row) { ?>
                                                <option value="<?php echo $location_result_row['category_name'] ?>">
                                                    <?php echo $location_result_row['category_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="edit_location">
                                            Location </label>
                                    </div>
                                    <div class="form-floating col-md-6 mb-2">
                                        <input type="text" class="form-control" name="edit_designation"
                                            placeholder="Designation">
                                        <label class="ms-2 form-control-placeholder" for="edit_designation">
                                            Designation </label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="edit_employee_button" name="edit_employee_button" type="submit"
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
                                    <th scope="col">Employee Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Designation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($employee_data_result as $employee_data_result_row) {
                                    echo '<tr>';
                                    echo '<th scope="row">
                                            <button type="button" class="btn btn-success btn-sm" onclick="edit_employee(\'' . $employee_data_result_row['id'] . '\')" data-bs-toggle="modal"
                                                data-bs-target="#edit_employee_modal">
                                                <i class="lni lni-pencil"></i>
                                            </button>
                                            <a href="../php/delete.php?delete_employee=' . $employee_data_result_row['id'] . '&employee_name=' . $employee_data_result_row['first_name'] . ' ' . $employee_data_result_row['last_name'] . '" onclick="return confirm(\'Delete Employee?\')" class="btn btn-danger btn-sm">
                                                <i class="lni lni-trash-can"></i>
                                            </a>
                                        </th>';
                                    echo "<td>" . $employee_data_result_row['employee_number'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['first_name'] . ' ' . $employee_data_result_row['last_name'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['email'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['department'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['branch'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['location'] . "</td>";
                                    echo "<td>" . $employee_data_result_row['designation'] . "</td>";
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
        function edit_employee(edit_employee_id) {
            event.preventDefault();

            // Fetch data from the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/employee_list.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Parse the JSON response
                    var employee_data = JSON.parse(xhr.responseText);
                    document.querySelector('input[name="edit_id_number"]').value = employee_data.id;
                    document.querySelector('input[name="edit_employee_number"]').value = employee_data.employee_number;
                    document.querySelector('input[name="edit_email"]').value = employee_data.email;
                    document.querySelector('input[name="edit_last_name"]').value = employee_data.last_name;
                    document.querySelector('input[name="edit_first_name"]').value = employee_data.first_name;
                    document.querySelector('select[name="edit_department"]').value = employee_data.department;
                    document.querySelector('select[name="edit_branch"]').value = employee_data.branch;
                    document.querySelector('select[name="edit_location"]').value = employee_data.location;
                    document.querySelector('input[name="edit_designation"]').value = employee_data.designation;
                }
            };
            xhr.send('edit_employee_id=' + encodeURIComponent(edit_employee_id));
        }
    </script>
</body>

</html>