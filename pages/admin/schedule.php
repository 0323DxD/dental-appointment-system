<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dental-appointment-system/auth.php';
checkRole(['Administrator']); // Only Administrator can access
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Schedule - Trinity Smiles Dental</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/8c6de87254.js" crossorigin="anonymous"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            new DataTable('#myTable', {
                dom: `<'d-flex justify-content-between mb-2 align-items-center'l<'d-flex align-items-center'<'d-none d-lg-block me-2'>f>>
                rt
                <'d-flex justify-content-between align-items-center mt-3'ip>
                `,
                language: {
                    emptyTable: "No services available",
                }
            });
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

            <!-- Nav Item - Appointments -->
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">
                    <i class="fas fa-fw fa-calendar-day"></i>
                    <span>Appointments</span></a>
            </li>
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Services -->
            <li class="nav-item">
                <a class="nav-link" href="services.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Services</span></a>
            </li>
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Users -->
            <li class="nav-item active">
                <a class="nav-link" href="schedule.php">
                    <i class="fas fa-fw fa-calendar-week"></i>
                    <span>Schedule</span></a>
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

                                <span
                                    class=" text-primary mr-2 small font-weight-bold"><?php echo getFullname(); ?><br><span
                                        class="text-secondary font-weight-light"><?php echo getRole(); ?></span></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Schedule</h1>
                        <button type="button" class="btn btn-md btn-book fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addServiceModal"><i class="fa fa-circle-plus">
                            </i> Add Schedule
                        </button>
                    </div>
                    <div class="table-responsive px-1 py-1">
                        <div class="data_table">
                            <table id="myTable" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $query = "SELECT * FROM schedule";
                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $items['id']; ?>
                                                </td>
                                                <td>
                                                    <?= $items['day']; ?>
                                                </td>
                                                <td>
                                                    <?= date("h:i A", strtotime($items['startTime'])) . " - " . date("h:i A", strtotime($items['endTime'])); ?>
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
                            <form action="/dental-appointment-system/pages/admin/api/deleteschedule" method="post">
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
                <!-- ADD Schedule Modal -->
                <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addServiceModalLabel">Add Schedule</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/dental-appointment-system/pages/admin/api/createschedule" method="POST"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input id="day" type="text" name="day"
                                            class="form-control form-control-md rounded-3" placeholder="Day" required />
                                        <label for="day">
                                            Day
                                        </label>
                                        <div class="invalid-feedback">
                                            Please enter the day.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="startTime" type="time" name="startTime"
                                            class="form-control form-control-md rounded-3 mt-2" placeholder="Start Time"
                                            required />
                                        <label for="startTime">
                                            Start Time
                                        </label>
                                        <div class="invalid-feedback">
                                            Please enter the start time.
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <input id="endTime" type="time" name="endTime"
                                            class="form-control form-control-md rounded-3 mt-2" placeholder="End Time"
                                            required />
                                        <label for="endTime">
                                            Start Time
                                        </label>
                                        <div class="invalid-feedback">
                                            Please enter the start time.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-book">Add Schedule</button>
                                </div>
                            </form>
                        </div>
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
                                Update Schedule
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM schedule");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <form action="/dental-appointment-system/pages/admin/api/editschedule" method="post"
                            class="needs-validation" novalidate>
                            <div class="modal-body">
                                <input type="hidden" name="update_id" id="update_id">
                                <div class="form-floating mb-3">
                                    <input id="day" type="text" name="day"
                                        class="form-control form-control-md rounded-3" value="<?php echo $row['day'] ?>" placeholder="Day" required />
                                    <label for="day">
                                        Day
                                    </label>
                                    <div class="invalid-feedback">
                                        Please enter the day.
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="startTime" type="time" name="startTime"
                                        class="form-control form-control-md rounded-3 mt-2" value="<?php echo $row['startTime'] ?>" placeholder="Start Time"
                                        required />
                                    <label for="startTime">
                                        Start Time
                                    </label>
                                    <div class="invalid-feedback">
                                        Please enter the start time.
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <input id="endTime" type="time" name="endTime"
                                        class="form-control form-control-md rounded-3 mt-2" value="<?php echo $row['endTime'] ?>"placeholder="End Time"
                                        required />
                                    <label for="endTime">
                                        End Time
                                    </label>
                                    <div class="invalid-feedback">
                                        Please enter the end time.
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="updatedata" class="btn btn-book"><i
                                        class="bi bi-pencil-square"></i>
                                    Update Schedule</button>
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
                echo "toastr.error('" . $_SESSION['deleteerror'] . "', 'Deletion Error');";
                unset($_SESSION['deleteerror']);
            }
            if (isset($_SESSION['deletesuccess'])) {
                echo "toastr.success('" . $_SESSION['deletesuccess'] . "', 'Deleted Success');";
                unset($_SESSION['deletesuccess']);
            }
            if (isset($_SESSION['serviceerror'])) {
                echo "toastr.error('" . $_SESSION['serviceerror'] . "', 'Added Error');";
                unset($_SESSION['serviceerror']);
            }
            if (isset($_SESSION['error'])) {
                echo "toastr.error('" . $_SESSION['error'] . "', 'Added Error');";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "toastr.success('" . $_SESSION['success'] . "', 'Added Success');";
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['emailexists'])) {
                echo "toastr.error('" . $_SESSION['emailexists'] . "', 'User Error');";
                unset($_SESSION['emailexists']);
            }
            if (isset($_SESSION['servicesuccess'])) {
                echo "toastr.success('" . $_SESSION['servicesuccess'] . "', 'Added Success');";
                unset($_SESSION['servicesuccess']);
            }
            if (isset($_SESSION['registrationsuccess'])) {
                echo "toastr.success('" . $_SESSION['registrationsuccess'] . "', 'Added Success');";
                unset($_SESSION['registrationsuccess']);
            }
            if (isset($_SESSION['registrationfailed'])) {
                echo "toastr.error('" . $_SESSION['registrationfailed'] . "', 'Added Failed');";
                unset($_SESSION['registrationfailed']);
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
                $('#updateService').val(data[1]);    // Assuming first column is ID
                $('#updateDescription').val(data[2]);    // Assuming first column is ID
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
</body>

</html>