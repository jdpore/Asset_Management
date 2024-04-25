<?php include '../php/inventory_list.php' ?>
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
    <link rel="stylesheet" href="../style/counter.css">

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
            <div class="container-fluid shadow-lg bg-body rounded p-5 h-100 overflow-auto">
                <div class="border-bottom row align-items-center mb-5 py-3">
                    <div class="col-10">
                        <h1>Inventory</h1>
                    </div>
                    <div class="col-2">
                        <?php include 'search_bar.php' ?>
                    </div>
                </div>
                <div class="row overflow-auto h-50">
                    <div class="col-12">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">Asset Name</th>
                                    <th scope="col" colspan="4">Asset Tally</th>
                                </tr>
                                <tr>
                                    <th scope="col">Deployed</th>
                                    <th scope="col">Available</th>
                                    <th scope="col">Disposed</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../php/inventory_table.php' ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="border-top row align-items-center pt-4 mt-4">
                    <div class="col-4 text-center border pt-3 bg-light">Asset Deployed: <h3>
                            <?php echo $deployed_count_row['deployed_count']; ?>
                        </h3>
                    </div>
                    <div class="col-4 text-center border-top border-bottom pt-3">Asset Available: <h3>
                            <?php echo $available_count_row['available_count']; ?>
                        </h3>
                    </div>
                    <div class="col-4 text-center border pt-3 bg-light">Assets Disposed: <h3>
                            <?php echo $disposal_count_row['disposal_count']; ?>
                        </h3>
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