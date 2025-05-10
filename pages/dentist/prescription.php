<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dental-appointment-system/auth.php';
checkRole(['Dentist']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prescription - Trinity Smiles Dental</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" href="/dental-appointment-system/img/clockt.png" type="image/x-icon" />
    <!-- Custom styles for this template-->
    <link href="/dental-appointment-system/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dental-appointment-system/vendor/apexcharts/dist/apexcharts.css">
    <script src="/dental-appointment-system/vendor/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="/dental-appointment-system/css/dashboard.css">
    <link rel="stylesheet" href="/dental-appointment-system/css/validate.css">
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/8c6de87254.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            new DataTable('#myTable', {
                dom: `<'d-flex justify-content-between mb-2 align-items-center'l<'d-flex align-items-center'<'d-none d-lg-block me-2'>f>>
                rt
                <'d-flex justify-content-between align-items-center mt-3'ip>
                `,
                language: {
                    emptyTable: "No prescription available",
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/hugerte@1/hugerte.min.js"></script>
    <script>
        hugerte.init({
            selector: '#notes'
        });
    </script>
    <script>
        hugerte.init({
            selector: '#updateNotes'
        });
    </script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-blue sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="/dental-appointment-system/img/clockt.png" alt="Logo" width="60"
                        class="d-inline-block align-text-top">
                </div>
                <div class="sidebar-brand-text mx-3">TDS DAS</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">
                    <i class="fas fa-fw fa-calendar-day"></i>
                    <span>Appointments</span></a>
            </li>
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="services.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Services</span></a>
            </li>
            <hr class="sidebar-divider mb-0">
            <!-- Nav Item - Prescription -->
            <li class="nav-item active">
                <a class="nav-link">
                    <i class="fas fa-fw fa-prescription"></i>
                    <span>Prescription</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border-bottom">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle ms-2">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown me-2">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class=" text-primary mr-2 small font-weight-bold">Dr.
                                    <?php echo getFullname(); ?><br><span
                                        class="text-secondary font-weight-light"><?php echo getRole(); ?></span></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/dental-appointment-system/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid px-3">
                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Prescription</h1>
                        <button type="button" class="btn btn-md btn-book fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addPrescriptionModal"><i class="fa fa-prescription me-1">
                            </i> Add Prescription
                        </button>
                    </div>
                    <div class="table-responsive px-1 py-1">
                        <div class="data_table">
                            <table id="myTable" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Patient</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $query = "SELECT * FROM prescriptions";
                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $items['id']; ?>
                                                </td>
                                                <td>
                                                    <?= $items['patient_name']; ?>
                                                </td>
                                                <td>
                                                    <?= $items['notes']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group me-2">
                                                        <button type="button" class="btn btn-book btn-md editbtn px-2"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-danger btn-md deletebtn px-2"><i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DELETE Modal -->
                <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">
                                    <i class="bi bi-exclamation-triangle-fill text-primary" width="24" height="24"></i>
                                    Confirm Deletion
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/dental-appointment-system/pages/dentist/api/deleteprescription"
                                method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="delete_id" id="delete_id">
                                    <p class="lead">Are you sure you want to delete this item? This action cannot be
                                        undone.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="deletedata" class="btn btn-danger">
                                        Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    <i class="bi bi-pencil-square"></i>
                                    Update Prescription
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            $query = "SELECT * FROM prescriptions";
                            $query_run = mysqli_query($conn, $query);

                            // Example: Load only the first record for now
                            if (mysqli_num_rows($query_run) > 0) {
                                $rows = mysqli_fetch_assoc($query_run); // Use just the first row
                                ?>
                                <form action="/dental-appointment-system/pages/dentist/api/updateprescription"
                                    method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="update_id" id="update_id"
                                            value="<?php echo $rows['id']; ?>">

                                        <div class="form-floating mb-3">
                                            <input id="updateName" type="text" name="patient_name" maxlength="100"
                                                class="form-control form-control-md rounded-3 readonly-input"
                                                placeholder="Patient" required onkeypress="return noNumber(event)"
                                                value="<?php echo htmlspecialchars($rows['patient_name']); ?>" readonly />
                                            <label for="updateName">Patient</label>
                                            <div class="invalid-feedback">Please enter the service.</div>
                                        </div>

                                        <div class="form-floating mt-3">
                                            <textarea id="updateNotes" name="notes"
                                                class="form-control form-control-md rounded-3" required placeholder="Notes"
                                                style="height: 100px;"><?php echo htmlspecialchars($rows['notes']); ?></textarea>
                                            <div class="invalid-feedback">Please enter the notes.</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="updatedata" class="btn btn-book">
                                            <i class="bi bi-pencil-square"></i> Update Prescription
                                        </button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo "<p>No prescriptions found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- ADD PRESCRIPTION Modal -->
                <div class="modal fade" id="addPrescriptionModal" tabindex="-1" aria-labelledby="addPrescriptionModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addPrescriptionModalLabel">Add New Prescription</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            $id = userID(); // Assuming this returns a valid user ID
                            
                            if (!empty($id)) {
                                // Use a prepared statement for security
                                $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE user_id = ?");
                                mysqli_stmt_bind_param($stmt, "i", $id); // 'i' for integer
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                } else {
                                    // Handle case where no user is found
                                    $row = null;
                                }

                                mysqli_stmt_close($stmt);
                            } else {
                                $row = null;
                                // Optionally handle empty user ID
                            }
                            ?>
                            <form action="/dental-appointment-system/pages/dentist/api/addprescription" method="POST"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <input id="dentist_name" type="hidden" name="dentist_name" maxlength="100"
                                        class="form-control form-control-md rounded-3 readonly-input" required
                                        onkeypress="return noNumber(event)" value="<?php echo $row['name'] ?>"
                                        placeholder="Dentist Name" readonly />
                                    <div class="mt-3">
                                        <select class="form-select py-3 rounded-3" id="patient_name" name="patient_name"
                                            data-placeholder="Patient" required>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select the patient name.
                                        </div>
                                    </div>
                                    <div class="form-floating mt-3">
                                        <textarea id="notes" name="notes" class="form-control form-control-md rounded-3"
                                            required placeholder="Notes" style="height: 100px;"></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the notes.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-book">Add Prescription</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white shadow border-top">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">©
                            <script>document.write(new Date().getFullYear())</script>
                            </span> Trinity Smiles Dental | All Rights Reserved.</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="/dental-appointment-system/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/dental-appointment-system/vendor/apexcharts/dist/apexcharts.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/dental-appointment-system/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/dental-appointment-system/js/sb-admin-2.min.js"></script>

        <script src="/dental-appointment-system/js/main.js"></script>
        <script src="/dental-appointment-system/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function () {
                toastr.options = {
                    closeButton: true,
                    debug: false,
                    newestOnTop: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };

                <?php
                if (isset($_SESSION['errorupdate'])) {
                    echo "toastr.error('" . $_SESSION['errorupdate'] . "', 'Update Error');";
                    unset($_SESSION['errorupdate']);
                }
                if (isset($_SESSION['saveupdate'])) {
                    echo "toastr.success('" . $_SESSION['saveupdate'] . "', 'Update Success');";
                    unset($_SESSION['saveupdate']);
                }
                if (isset($_SESSION['deleteerror'])) {
                    echo "toastr.error('" . $_SESSION['deleteerror'] . "', 'Delete Error');";
                    unset($_SESSION['deleteerror']);
                }
                if (isset($_SESSION['deletesuccess'])) {
                    echo "toastr.success('" . $_SESSION['deletesuccess'] . "', 'Delete Success');";
                    unset($_SESSION['deletesuccess']);
                }
                if (isset($_SESSION['serviceerror'])) {
                    echo "toastr.error('" . $_SESSION['serviceerror'] . "', 'Added Error');";
                    unset($_SESSION['serviceerror']);
                }
                if (isset($_SESSION['servicesuccess'])) {
                    echo "toastr.success('" . $_SESSION['servicesuccess'] . "', 'Added Success');";
                    unset($_SESSION['servicesuccess']);
                }
                if (isset($_SESSION['prescriptionerror'])) {
                    echo "toastr.error('" . $_SESSION['prescriptionerror'] . "', 'Added Error');";
                    unset($_SESSION['prescriptionerror']);
                }
                if (isset($_SESSION['prescriptionsuccess'])) {
                    echo "toastr.success('" . $_SESSION['prescriptionsuccess'] . "', 'Added Success');";
                    unset($_SESSION['prescriptionsuccess']);
                }
                if (isset($_SESSION['errorprescription'])) {
                    echo "toastr.error('" . $_SESSION['errorprescription'] . "', 'Update Error');";
                    unset($_SESSION['errorprescription']);
                }
                if (isset($_SESSION['saveprescription'])) {
                    echo "toastr.success('" . $_SESSION['saveprescription'] . "', 'Update Success');";
                    unset($_SESSION['saveprescription']);
                }
                ?>
            });
        </script>
        <script>
            $(document).ready(function () {
                $(document).on('click', '.editbtn', function () {
                    // Show the modal
                    $('#editmodal').modal('show');

                    // Get the closest row of the clicked button
                    var $tr = $(this).closest('tr');

                    // Extract text from each table cell in the row
                    var data = $tr.find('td').map(function () {
                        return $(this).text().trim();
                    }).get();

                    console.log(data); // Debugging: check the row data in console

                    // Fill modal inputs with data
                    $('#update_id').val(data[0]);    // Assuming first column is ID
                    $('#updateNotes').val(data[2]);    // Assuming first column is ID
                    // Assuming seventh column is status
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $(document).on('click', '.deletebtn', function () {
                    $('#deletemodal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function () {
                        return $(this).text().trim();
                    }).get();
                    console.log(data);
                    $('#delete_id').val(data[0]);
                });
            });
        </script>
        <script>
            // Replace with the actual path to your PHP script
            fetch('/dental-appointment-system/pages/dentist/api/fetch_patient.php')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('patient_name');
                    select.innerHTML = '<option value="" disabled selected hidden></option>';

                    data.forEach(patient_name => {
                        const option = document.createElement('option');
                        option.value = patient_name;
                        option.textContent = patient_name;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading procedure:', error);
                    document.getElementById('patient_name').innerHTML =
                        '<option value="" disabled selected hidden></option>';
                });
        </script>
        <script>
            $(document).ready(function () {
                $('#patient_name').select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $('#addPrescriptionModal'),
                    containerCssClass: "select2--medium",
                    dropdownCssClass: "select2--medium"
                });
            });
        </script>
</body>

</html>