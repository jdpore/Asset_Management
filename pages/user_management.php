<?php
include '../php/field_list.php';
include '../php/employee_list.php';
include '../php/add.php';
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
                        <h1>Users</h1>
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
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_user_modal_label">Add user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="" onsubmit="return isValid()" method="POST">
                                    <div class="form-floating col-md-12 mb-2">
                                        <select class="form-select" name="user_employee_number">
                                            <option disabled selected value="">Select Employee Name...</option>
                                            <?php foreach ($employee_data_result as $employee_data_result_row) {
                                                // Check if the current employee_number exists in user_data table
                                                $employee_number = $employee_data_result_row['employee_number'];
                                                $check_query = "SELECT COUNT(*) AS count FROM user_data WHERE employee_number = '$employee_number'";
                                                $check_result = mysqli_query($conn, $check_query);
                                                $check_row = mysqli_fetch_assoc($check_result);
                                                $count = $check_row['count'];

                                                // If the employee_number is not found in user_data, show the option
                                                if ($count == 0) { ?>
                                                    <option value="<?php echo $employee_number ?>">
                                                        <?php echo $employee_data_result_row['first_name'], " ", $employee_data_result_row['last_name'], " - ", $employee_data_result_row['branch'] ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="user_employee_number">
                                            Employee Name </label>
                                    </div>
                                    <div class="form-floating col-md-12 mb-2">
                                        <select class="form-select" name="user_role">
                                            <option disabled selected value="">User Role...</option>
                                            <option value="0">Super Admin</option>
                                            <option value="1">Admin</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="user_role">
                                            User Role </label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="add_user_button" name="add_user_button" type="submit"
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
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">User Role</th>
                                    <th scope="col">Branch</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user_data_result as $user_data_result_row) {
                                    echo '<tr>';
                                    echo '<th scope="row">
                                            <a href="../php/delete.php?delete_user=' . $user_data_result_row['employee_number'] . '" onclick="return confirm(\'Delete User?\')" class="btn btn-danger btn-sm">
                                                <i class="lni lni-trash-can"></i>
                                            </a>
                                        </th>';
                                    echo "<td>" . $user_data_result_row['employee_number'] . "</td>";
                                    echo "<td>" . $user_data_result_row['email'] . "</td>";
                                    echo "<td>" . $user_data_result_row['password'] . "</td>";
                                    echo "<td>" . $user_data_result_row['user_role'] . "</td>";
                                    echo "<td>" . $user_data_result_row['branch'] . "</td>";
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
</body>

</html>