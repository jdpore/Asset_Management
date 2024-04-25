<?php
include '../php/auto_redirect.php';
if (isset($_POST['print_data'])) {
    $control_number = $_POST['control_number'];

    $accountability_data_query = "SELECT * FROM accountability_details WHERE control_number = '$control_number'";
    $accountability_data_result = mysqli_query($conn, $accountability_data_query);
    $accountability_data = mysqli_fetch_assoc($accountability_data_result);

    foreach ($accountability_data_result as $accountability_data_row) {
        $asset_sticker_numbers[] = $accountability_data_row['asset_id'];
    }
    $user_accountable_data_query = "SELECT * FROM employee_data WHERE employee_number = '" . $accountability_data['employee_number'] . "'";
    $user_accountable_data_result = mysqli_query($conn, $user_accountable_data_query);
    $user_accountable_data = mysqli_fetch_assoc($user_accountable_data_result);
}
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

    <link rel="stylesheet" href="../style/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/sidebar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .name-label {
            text-transform: uppercase;
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

        .input-field {
            background-color: transparent;
            border: none;
            outline: none;
            color: white;

        }

        label {
            color: #333333;
        }

        @media print {
            .no-print {
                display: none;
            }

            .visible-on-website {
                display: none;
            }

            .print-footer {
                display: block;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        }

        .title {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 10px;
            font-size: 32px;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
        }

        /* New styles for prepared by text */
        .prepared-by {
            text-align: left;

            font-style: italic;
            font-size: 15px;

        }

        @media screen {
            .visible-on-website {
                display: block;
            }

            .print-footer {
                display: none;
            }
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
                        <h1>Asset Accountability Form</h1>
                    </div>
                </div>
                <div class="row h-75 overflow-auto">
                    <div id="print-content">
                        <div class="invoice p-3 mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="d-flex align-items-center">
                                            <img src="../image/logo.jpg" alt="Logo" width="100" height="60"
                                                class="mr-2">
                                            U-Bix Corporation
                                        </h4>
                                        <div class="col-sm-6 mx-auto">
                                            <div class="title text-center">
                                                Asset Accountability Form
                                            </div>
                                            <div class="subtitle text-center">
                                                Management Information System
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="container">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 mx-auto invoice-col">
                                        <address>
                                            <strong>Name: </strong>
                                            <?php echo $user_accountable_data['first_name'], ' ', $user_accountable_data['last_name'] ?><br>
                                            <strong>Department: </strong>
                                            <?php echo $user_accountable_data['department'] ?><br>
                                            <strong>Designation: </strong>
                                            <?php echo $user_accountable_data['designation'] ?><br>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 mx-auto invoice-col">
                                        <address>
                                            <strong>Date: </strong>
                                            <?php echo date('F d, Y', strtotime($accountability_data['date_allocation'])) ?><br>
                                            <strong>Control Number: </strong>
                                            <?php echo $control_number ?><br>
                                            <strong>Location: </strong>
                                            <?php echo $accountability_data['location'] ?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <div class="container">
                                <table class="table table-bordered" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">No.</th>
                                            <th colspan="5" class="text-center align-middle">Description</th>
                                            <th rowspan="2" class="text-center align-middle">Serial Number</th>
                                            <th rowspan="2" class="text-center align-middle">Sticker Number</th>
                                            <th rowspan="2" class="text-center align-middle">Remarks</th>
                                            <th rowspan="2" class="text-center align-middle">Status</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Brand/Model</th>
                                            <th class="text-center">Processor</th>
                                            <th class="text-center">OS</th>
                                            <th class="text-center">RAM</th>
                                            <th class="text-center">Hard Drive/ Capacity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($asset_sticker_numbers); $i++) {
                                            $get_asset_data_query = "SELECT * FROM inventory WHERE id = '$asset_sticker_numbers[$i]'";
                                            $get_asset_data_result = mysqli_query($conn, $get_asset_data_query);
                                            $get_asset_data_row = mysqli_fetch_assoc($get_asset_data_result);
                                            ?>
                                            <tr>
                                                <td class="Item_Name">
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td class="Item_Name">
                                                    <?php echo $get_asset_data_row['asset_brand_model'], ' <br> ', $get_asset_data_row['asset_name'] ?>
                                                </td>
                                                <td class="Description">
                                                    <?php echo $get_asset_data_row['asset_processor'] ?>
                                                </td>
                                                <td class="Description">
                                                    <?php echo $get_asset_data_row['asset_operating_system'] ?>
                                                </td>
                                                <td class="Description">
                                                    <?php echo $get_asset_data_row['asset_ram'] ?>
                                                </td>
                                                <td class="Description">
                                                    <?php echo $get_asset_data_row['asset_storage'] ?>
                                                </td>
                                                <td class="Serial_Number">
                                                    <?php echo $get_asset_data_row['asset_serial_number'] ?>
                                                </td>
                                                <td class="Sticker_Number">
                                                    <?php echo $get_asset_data_row['asset_sticker_number'] ?>
                                                </td>
                                                <td class="Item_Condition">
                                                    <?php echo $get_asset_data_row['asset_condition'] ?>
                                                </td>
                                                <td class="Remarks">
                                                    <?php echo $get_asset_data_row['asset_status'] ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="asset_table" class="container d-none">
                                <table class="table table-bordered"
                                    style="border-collapse: collapse; background-color: transparent; color: #212529; margin-bottom: 1rem; overflow: auto; width: 100%; border: 1px solid #dee2e6; text-align: center;"
                                    width="100%" align="center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">No.</th>
                                            <th colspan="5" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">Description</th>
                                            <th rowspan="2" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">Serial Number</th>
                                            <th rowspan="2" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">Sticker Number</th>
                                            <th rowspan="2" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">Remarks</th>
                                            <th rowspan="2" class="text-center align-middle"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: middle; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="middle">Status</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: bottom; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="bottom">Brand/Model</th>
                                            <th class="text-center"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: bottom; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="bottom">Processor</th>
                                            <th class="text-center"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: bottom; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="bottom">OS</th>
                                            <th class="text-center"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: bottom; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="bottom">RAM</th>
                                            <th class="text-center"
                                                style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: bottom; border-bottom: 2px solid #dee2e6; border-bottom-width: 2px"
                                                align="center" valign="bottom">Hard Drive/ Capacity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($asset_sticker_numbers); $i++) {
                                            $get_asset_data_query = "SELECT * FROM inventory WHERE id = '$asset_sticker_numbers[$i]'";
                                            $get_asset_data_result = mysqli_query($conn, $get_asset_data_query);
                                            $get_asset_data_row = mysqli_fetch_assoc($get_asset_data_result);
                                            ?>
                                            <tr>
                                                <td class="Item_Name"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td class="Item_Name"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_brand_model'], ' <br> ', $get_asset_data_row['asset_name']; ?>
                                                </td>
                                                <td class="Description"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_processor'] ?>
                                                </td>
                                                <td class="Description"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_operating_system'] ?>
                                                </td>
                                                <td class="Description"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_ram'] ?>
                                                </td>
                                                <td class="Description"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_storage'] ?>
                                                </td>
                                                <td class="Serial_Number"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_serial_number'] ?>
                                                </td>
                                                <td class="Sticker_Number"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_sticker_number'] ?>
                                                </td>
                                                <td class="Item_Condition"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_condition'] ?>
                                                </td>
                                                <td class="Remarks"
                                                    style="border-top: 1px solid #dee2e6; padding: 0.75rem; vertical-align: top; border: 1px solid #dee2e6"
                                                    valign="top">
                                                    <?php echo $get_asset_data_row['asset_status'] ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="prepared-by">I hereby acknowledge the above assets and hold myself
                                            accountable as long as i am connected with U-BIX corporation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10 mx-auto">
                                        <table class="table" style="border-collapse: collapse; border: none;">
                                            <tbody>
                                                <tr>
                                                    <td style="border:none;"> <strong>Received By:</strong></td>
                                                    <td class="underline" style="border:none;">
                                                        <div class="name-label">
                                                            <?php echo $user_accountable_data['first_name'], ' ', $user_accountable_data['last_name'] ?>
                                                        </div>
                                                        <div class="signature-text">Signature over printed name</div>
                                                    </td>
                                                    <td style="border:none;"><strong>Prepared By:</strong></td>
                                                    <td class="underline" style="border:none;">
                                                        <div class="name-label">
                                                            <?php echo $user_full_name ?>
                                                        </div>
                                                        <div class="signature-text">Signature over printed name</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border:none;"><strong>Approved By:</strong></td>
                                                    <td class="underline" style="border:none;">
                                                        <div contenteditable="" class="name-label">[Enter Name]</div>
                                                        <div class="signature-text">Signature over printed name</div>
                                                    </td>
                                                    <td style="border:none;"><strong>Approved By:</strong></td>
                                                    <td class="underline" style="border:none;">
                                                        <div contenteditable="" class="name-label">[Enter Name]</div>
                                                        <div class="signature-text">Signature over printed name</div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="no-print" style="text-align: center; margin-top: 20px;">
                                <button class="btn btn-primary" onclick="printContent()">Print Table</button>
                                <button class="btn btn-secondary" onclick="window.history.back()">Back</button>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table id="resultTable" class="table table-striped">
                                    </table>
                                </div>
                            </div>
                        </div>
                        <footer class="main-footer print-footer hidden-on-website">
                            <p style="display: inline-block;">Form # UBX-MIS-13<br>March 2010</p>
                            <p style="float: right; display: inline-block;">Revision no.:00</p>
                        </footer>
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
    <script>
        function printContent() {
            // Hide elements outside the print-content div
            var elementsToHide = document.querySelectorAll('body > *:not(#print-content)');
            elementsToHide.forEach(function (element) {
                element.style.display = 'none';
            });

            // Print the content inside the print-content div
            var printContent = document.getElementById('print-content').innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;

            var firstName = "<?php echo $user_accountable_data['first_name']; ?>";
            var lastName = "<?php echo $user_accountable_data['last_name']; ?>";
            var name = firstName + " " + lastName;

            var controlNumber = "<?php echo $control_number; ?>";
            var email = "<?php echo $user_accountable_data['email']; ?>";

            var body = '<div class="container">';
            body += document.getElementById('asset_table').innerHTML;
            body += '</div>';

            body = name + '<br><br>This is to inform you that you have an Asset Accountability with control number <b>' + controlNumber + '</b><br><br>' + body + '<br> NOTE: If there are any concerns with the data sent, please contact the Management Information System (MIS) office.<br><br>U-BIX Corporation<br> Department: Management Information System (MIS)<br><br> Email us at mis@ubix.com.ph local 156';
            var message = body;

            $.ajax({
                type: "POST",
                url: "../php/send_email.php",
                data: { name: name, email: email, message: message },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            // Print
            window.print();

            // When printing is done or canceled, restore the original content and refresh the page
            window.addEventListener('afterprint', function () {
                location.reload(); // Refresh the page
            });

            // Show the hidden elements after printing
            elementsToHide.forEach(function (element) {
                element.style.display = '';
            });
        }
    </script>


</body>

</html>