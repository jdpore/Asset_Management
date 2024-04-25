<?php
include '../php/category_list.php';
include '../php/add.php';
include '../php/delete.php';
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
                        <h1>Categories</h1>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-tool" data-bs-toggle="modal"
                            data-bs-target="#addUserModal">
                            <i class="lni lni-plus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" onclick="window.location='reset.php';">
                            Reset
                        </button>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php' ?>
                    </div>
                </div>
                <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">Add Fields</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form class="row g-3" action="" onsubmit="return isValid()" method="POST">
                                    <div class="form-floating col-md-12 mb-2">
                                        <select class="form-select" name="field">
                                            <option disabled selected value="">Select Field...</option>
                                            <option value='department'>Department</option>
                                            <option value='location'>Location</option>
                                            <option value='branch'>Branch</option>
                                        </select>
                                        <label class="ms-2 form-control-placeholder" for="field">
                                            Field </label>
                                    </div>
                                    <div class="form-floating col-md-12 mb-2">
                                        <input type="text" class="form-control" name="category"
                                            placeholder="Category Name">
                                        <label class="ms-2 form-control-placeholder" for="category">
                                            Category Name</label>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button id="add_category_button" name="add_category_button" type="submit"
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
                                    <th scope="col">Field</th>
                                    <th scope="col">Category Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($category_result as $category_result_row) {
                                    echo '<tr>';
                                    echo '<th scope="row">
                                            <a href="../php/delete.php?category_id=' . $category_result_row['id'] . '&category_name=' . $category_result_row['category_name'] . '" onclick="return confirm(\'Delete Category?\')" class="btn btn-danger btn-sm">
                                                <i class="lni lni-trash-can"></i>
                                            </a>
                                        </th>';
                                    echo "<td>" . $category_result_row['field'] . "</td>";
                                    echo "<td>" . $category_result_row['category_name'] . "</td>";
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