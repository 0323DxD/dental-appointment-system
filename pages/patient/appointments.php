<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dental-appointment-system/auth.php';
checkRole(['Patient']);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appointments - Trinity Smiles Dental</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/8c6de87254.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/dental-appointment-system/img/clockt.png" type="image/x-icon" />
    <!-- Custom styles for this template-->
    <link href="/dental-appointment-system/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dental-appointment-system/vendor/apexcharts/dist/apexcharts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="/dental-appointment-system/css/dashboard.css">
    <script src="/dental-appointment-system/vendor/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="/dental-appointment-system/css/dashboard.css">
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
    <!-- FullCalendar scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="/dental-appointment-system/css/validate.css">
    <script type="text/javascript">
        $(document).ready(function () {
            new DataTable('#myTable', {
                dom: `<'d-flex justify-content-between mb-2 align-items-center'lf>
                rt
                <'d-flex justify-content-between align-items-center mt-3'ip>
                `,
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

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

            <!-- Nav Item - Appointments -->
            <li class="nav-item active">
                <a class="nav-link">
                    <i class="fas fa-fw fa-calendar-day"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <hr class="sidebar-divider mb-0">
            <li class="nav-item">
                <a class="nav-link" href="prescription.php">
                    <i class="fas fa-fw fa-calendar-day"></i>
                    <span>Prescription</span>
                </a>
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
                        <div class="topbar-divider d-none d-sm-block">

                        </div>
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
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Appointments</h1>
                        <button type="button" class="btn btn-md btn-book fw-bold" data-bs-toggle="modal"
                            data-bs-target="#bookAppointmentModal"><i class="fa fa-calendar">
                            </i> Book Now
                        </button>
                    </div>
                    <div class="mb-3" id='calendar'></div>
                    <div class="table-responsive px-1 py-1">
                        <div class="data_table">
                            <table id="myTable" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Preferred Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Assigned Doctor</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $uid = $_SESSION['uid'];
                                    $query = "SELECT * FROM appointments WHERE user_id='$uid'";
                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $items['id']; ?>
                                                </td>
                                                <td>
                                                    <?= date("F d, Y", strtotime($items['bookingDate'])); ?>
                                                </td>
                                                <td>
                                                    <?= date("h:i A", strtotime($items['preferredTime'])); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($items['status'] == "Scheduled") {
                                                        ?>
                                                        <span class="badge bg-primary">SCHEDULED
                                                        </span>
                                                        <?php
                                                    } else if ($items['status'] == "Completed") {
                                                        ?>
                                                            <span class="badge bg-success">COMPLETED
                                                            </span>
                                                        <?php
                                                    } else if ($items['status'] == "Canceled") {
                                                        ?>
                                                                <span class="badge bg-danger">CANCELED
                                                                </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                                <span class="badge bg-danger">PENDING
                                                                </span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= !empty($items['assigned_doctor']) ? $items['assigned_doctor'] : 'Not Assigned Yet'; ?>
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
                            <form action="/dental-appointment-system/pages/patient/api/deleteappointment" method="post">
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
                <!-- BOOK NOW Modal -->
                <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-labelledby="bookAppointmentModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookAppointmentModalLabel">Book Appointment</h5>
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
                            <form action="/dental-appointment-system/pages/patient/api/bookappointment" method="POST"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <small class="text-justify">Please be informed that this is not yet a
                                        confirmed
                                        booking. Our Dental
                                        Support Team will message you to confirm your appointment. Thank
                                        you.</small>
                                    <input type="hidden" name="user_id"
                                        class="form-control form-control-md rounded-3 mt-4 readonly-input" required
                                        value="<?php echo userID(); ?>" readonly />
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between mt-4">
                                            <label for="name" class="form-label fs-5 fw-bold text-primary">Name <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <input id="name" type="text" name="name" maxlength="100"
                                            class="form-control form-control-md rounded-3 readonly-input" required
                                            onkeypress="return noNumber(event)" value="<?php echo $row['name'] ?>"
                                            readonly />
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label fs-5 fw-bold text-primary">Age<span
                                                class="text-danger">
                                                *</span></label>
                                        <input id="age" type="text" name="age" maxlength="2" max="99" min="1"
                                            onkeypress="return noLetterOrSymbol(event)"
                                            value="<?php echo isset($_SESSION['entered_age']) ? htmlspecialchars($_SESSION['entered_age']) : ''; ?>"
                                            class="form-control form-control-md rounded-3" required />
                                        <div class="invalid-feedback">
                                            Please enter your age.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fs-5 fw-bold text-primary">Email
                                            Address<span class="text-danger"> *</span></label>
                                        <input id="email" type="email" name="email" onkeypress="return noSpace(event)"
                                            value="<?php echo $row['email'] ?>"
                                            class="form-control form-control-md rounded-3 readonly-input" required
                                            readonly />
                                        <div class="invalid-feedback">
                                            Please enter your email address.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact" class="form-label fs-5 fw-bold text-primary">Contact
                                            Number<span class="text-danger">
                                                *</span></label>
                                        <input id="contact" type="text" name="contact" maxlength="11"
                                            onkeypress="return noLetterOrSymbol(event)"
                                            value="<?php echo $row['phone'] ?>"
                                            class="form-control form-control-md rounded-3 readonly-input" required
                                            readonly />
                                        <div class="invalid-feedback">
                                            Please enter your contact number.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <label for="medicalRecord"
                                                class="form-label fs-5 fw-bold text-primary">Medical
                                                Record /
                                                Allergies<span class="text-danger"> *</span></label>
                                        </div>
                                        <textarea class="form-control rounded-3" id="medicalRecord" maxlength="100"
                                            style="resize:none" name="medicalRecord" rows="3"
                                            placeholder="Any allergies, conditions, or medications?"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter any details.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="procedure" class="form-label fs-5 fw-bold text-primary">Procedure
                                            <span class="text-danger">
                                                *</span></label>
                                        <select class="form-select py-1 rounded-3" id="procedure" name="procedure"
                                            required>
                                            <option value="" disabled selected hidden></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a procedure.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control py-3 rounded-3 readonly-input" id="price-display"
                                            name="price" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bookingDate" class="form-label fs-5 fw-bold text-primary">Preferred
                                            Date <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control form-control-sm rounded-3" required type="date"
                                            name="bookingDate"
                                            value="<?php echo isset($_SESSION['entered_date']) ? htmlspecialchars($_SESSION['entered_date']) : ''; ?>"
                                            id="bookingDate">
                                        <div class="invalid-feedback">
                                            Please choose your preferred date.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="preferredTime"
                                            class="form-label fs-5 fw-bold text-primary">Preferred
                                            Time <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control form-control-sm rounded-3"
                                            value="<?php echo isset($_SESSION['entered_time']) ? htmlspecialchars($_SESSION['entered_time']) : ''; ?>"
                                            required type="time" name="preferredTime" id="preferredTime">
                                        <div class="invalid-feedback">
                                            Please choose your preferred time.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="insurance" class="form-label fs-5 fw-bold text-primary">With Dental
                                            Insurance
                                            / HMO
                                            <span class="text-danger">
                                                *</span></label>
                                        <select class="form-select py-1 rounded-3" id="insurance" name="insurance"
                                            required>
                                            <option value="" disabled selected hidden></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select your option.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-book">Book Appointment</button>
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
                                    Update Appointment
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM appointments");
                            $row = mysqli_fetch_array($query);
                            ?>
                            <form action="/dental-appointment-system/pages/patient/api/editappointment" method="post"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <input type="hidden" name="update_id" id="update_id">
                                    <div class="form-floating mb-3">
                                        <input id="bookingDate" type="date" name="bookingDate"
                                            class="form-control form-control-md rounded-3" placeholder="Booking Date"
                                            required />
                                        <label for="bookingDate">
                                            Booking Date
                                        </label>
                                        <div class="invalid-feedback">
                                            Please enter the booking date.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="preferredTime" type="time" name="preferredTime"
                                            class="form-control form-control-md rounded-3 mt-2"
                                            placeholder="Preferred Time" required />
                                        <label for="preferredTime">
                                            Preferred Time
                                        </label>
                                        <div class="invalid-feedback">
                                            Please enter the preferred time.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="updatedata" class="btn btn-book"><i
                                            class="bi bi-pencil-square"></i>
                                        Update Appointment</button>
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
                if (isset($_SESSION['booking_error'])) {
                    echo "toastr.error('" . $_SESSION['booking_error'] . "', 'Appointment Booking Error');";
                    unset($_SESSION['booking_error']);
                }
                if (isset($_SESSION['booking_success'])) {
                    echo "toastr.success('" . $_SESSION['booking_success'] . "', 'Appointment Booking Success');";
                    unset($_SESSION['booking_success']);
                }
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
                    echo "toastr.success('" . $_SESSION['deletesuccess'] . "', 'Deleted Successfully');";
                    unset($_SESSION['deletesuccess']);
                }
                ?>
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
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('bookingDate').setAttribute('min', today);
        </script>
        <script>
            fetch('/dental-appointment-system/api/fetch_services.php')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('procedure');
                    const priceInput = document.getElementById('price-display');

                    select.innerHTML = '<option value="" disabled selected hidden>Select a procedure</option>';

                    data.forEach(service => {
                        const option = document.createElement('option');
                        option.value = service.service;
                        option.textContent = `${service.service} (₱${parseFloat(service.price).toFixed(2)})`;
                        option.setAttribute('data-price', service.price);
                        select.appendChild(option);
                    });

                    select.addEventListener('change', () => {
                        const selectedOption = select.options[select.selectedIndex];
                        const price = selectedOption.getAttribute('data-price');
                        priceInput.value = `₱${parseFloat(price).toFixed(2)}`; // Show price nicely formatted
                    });
                })
                .catch(error => {
                    console.error('Error loading procedure:', error);
                    document.getElementById('procedure').innerHTML =
                        '<option value="" disabled selected hidden>Error loading</option>';
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
                    // Assuming seventh column is status
                });
            });
        </script>
        <?php
        $query = "SELECT name as title, CONCAT(bookingDate, 'T', preferredTime) as start FROM appointments WHERE status = 'Scheduled'";
        $query_run = mysqli_query($conn, $query);
        $events = array();
        while ($row = mysqli_fetch_assoc($query_run)) {
            $events[] = $row;
        }
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: <?php echo json_encode($events); ?>,
                    selectable: true,
                    dayMaxEvents: true, // 🔑 Enables "+ more" link when too many events
                    editable: false,
                    nowIndicator: true,
                    buttonText: {
                        today: 'Today',
                        month: 'Month',
                        week: 'Week',
                        day: 'Day',
                        list: 'List',
                        prev: 'Prev',
                        next: 'Next'
                    },
                    headerToolbar: {
                        start: '',
                        center: 'title',
                        end: 'today prev,next'
                    },
                    eventContent: function (info) {
                        var date = info.event.start;
                        var timeStr = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        var dateStr = date.toLocaleDateString();
                        return {
                            html: `<div class="fc-event-time mx-2 px-3 fw-bold badge bg-primary text-light">Reserved: ${timeStr}</div>`
                        };
                    },
                    eventDidMount: function (info) {
                        // Format the date and time
                        var start = info.event.start;
                        var dateTimeStr = start.toLocaleString(); // e.g., "4/30/2025, 10:00:00 AM"

                        // Tooltip content
                        var tooltipContent = `<strong>Reserved Slot</strong><br>${dateTimeStr}`;

                        // Initialize Bootstrap tooltip
                        $(info.el).tooltip({
                            title: tooltipContent,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body',
                            html: true  // Important for using <br> and <strong>
                        });
                    },
                    height: 600,
                    aspectRatio: 1.8
                });


                calendar.render();
            });
        </script>
</body>

</html>