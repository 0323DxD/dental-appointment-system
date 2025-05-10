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

    <title>Appointments - Trinity Smiles Dental</title>

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
    <!-- FullCalendar scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            new DataTable('#myTable', {
                dom: `<'d-flex justify-content-between mb-2 align-items-center'l<'d-flex align-items-center'<'d-none d-lg-block me-2'B>f>>
                rt
                <'d-flex justify-content-between align-items-center mt-3'ip>
                `,
                language: {
                    emptyTable: "No appointments available",
                },
                buttons: ['copy',
                    {
                        extend: 'csv',
                        title: '',
                        messageTop: 'Appointments - Trinity Smiles Dental',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'excel',
                        title: '',
                        messageTop: 'Appointments - Trinity Smiles Dental',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'print',
                        title: '',
                        messageTop: function () {
                            return '<h2 style="text-align:center;color:black; margin-top:15px;">APPOINTMENTS</h2>';
                        },
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '12pt')
                                .prepend(
                                    '<br><br><br>',
                                    '<p style="position:absolute; margin-left: auto; margin-right: auto; margin-top: -60px; left: 0; right: 0; text-align: center; color:black; font-size: 30; font-weight: bold;">TRINITY SMILES DENTAL</p>',
                                    '<img src="/dental-appointment-system/img/clockt.png" style="position:absolute; top:10; left:100px; width:70px;" />',
                                );
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', '14pt');
                        },
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdf'
                    }
                ],
                columnDefs: [
                    { targets: [0, 1, 2, 3, 4, 5, 6] }
                ]
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
            <li class="nav-item active">
                <a class="nav-link">
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
            <li class="nav-item">
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

                                <span class=" text-primary mr-2 small font-weight-bold">
                                    <?php echo getFullname(); ?><br><span
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Appointments</h1>
                    </div>
                    <div class="mb-3" id='calendar'></div>
                    <div class="table-responsive px-1 py-1">
                        <div class="data_table">
                            <table id="myTable" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Medical History</th>
                                        <th scope="col">Procedure</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Dental Insurance</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Assigned Doctor</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $query = "SELECT * FROM appointments";
                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $items['id']; ?>
                                                </td>
                                                <td>
                                                    <?= $items['name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $items['age']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $items['medicalRecord']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $items['procedure']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= "₱" . $items['price']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $items['insurance']; ?>
                                                </td>
                                                <td class="text-center"
                                                    data-status="<?php echo htmlspecialchars($items['status']); ?>">
                                                    <?php
                                                    $status = strtoupper($items['status']);
                                                    $badgeClass = match ($items['status']) {
                                                        "Scheduled" => "bg-blue",
                                                        "Completed" => "bg-success",
                                                        "Canceled" => "bg-danger",
                                                        "Pending" => "bg-danger",
                                                        default => "bg-secondary"
                                                    };
                                                    ?>
                                                    <span class="badge <?= $badgeClass ?>"><?= $status ?></span>
                                                </td>
                                                <td class="text-center">
                                                <?= !empty($items['assigned_doctor']) ? $items['assigned_doctor'] : 'Not Assigned Yet'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group me-2">
                                                        <button type="button" class="btn btn-book btn-md editbtn px-2"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <?php if ($items['status'] == 'Scheduled'):
                                                            ?>
                                                            <button type="button"
                                                                class="btn btn-success btn-md editbtndentist px-2"><i
                                                                    class="fa fa-cog"></i></button>
                                                        <?php endif; ?>
                                                        <?php if ($items['status'] == 'Scheduled'):
                                                            ?>
                                                            <a href="/dental-appointment-system/pages/admin/api/sendemailnotification.php?id=<?php echo $items['id']; ?>"
                                                                class="btn btn-warning px-2">
                                                                <i class="fa fa-bell"></i></a>
                                                        <?php endif; ?>
                                                        <?php if ($items['status'] == 'Canceled'):
                                                            ?>
                                                            <a href="/dental-appointment-system/pages/admin/api/sendemailnotificationcancel.php?id=<?php echo $items['id']; ?>"
                                                                class="btn btn-warning px-2">
                                                                <i class="fa fa-bell"></i></a>
                                                        <?php endif; ?>
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
                <!-- Edit Modal -->
                <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    <i class="bi bi-pencil-square"></i>
                                    Update Appointment Status
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="/dental-appointment-system/pages/admin/api/updateschedule" method="post"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <input type="hidden" name="update_id" id="update_id">
                                    <div class="form-floating mb-2">
                                        <select class="form-select form-select-md"
                                            value="<?php echo $items['status'] ?>" id="viewStatus" name="status"
                                            placeholder="Status" required>
                                            <option selected disabled>Choose from options</option>
                                            <option value="Scheduled">
                                                Scheduled</option>
                                            <option value="Completed" <?php
                                            if ($items['status'] == 'Completed') {
                                                echo "selected";
                                            }
                                            ?>>
                                                Completed</option>
                                            <option value="Canceled" <?php
                                            if ($items['status'] == 'Canceled') {
                                                echo "selected";
                                            }
                                            ?>>
                                                Canceled</option>
                                            <option value="Pending" <?php
                                            if ($items['status'] == 'Pending') {
                                                echo "selected";
                                            }
                                            ?>>
                                                Pending</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="updatedata" class="btn btn-book"><i
                                            class="bi bi-pencil-square"></i>
                                        Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Assigned Dentist Modal -->
                <div class="modal fade" id="editdentistmodal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    <i class="bi bi-pencil-square"></i>
                                    Assign Dentist
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="/dental-appointment-system/pages/admin/api/updatedentist" method="post"
                                class="needs-validation" novalidate>
                                <div class="modal-body">
                                    <input type="hidden" name="update_ids" id="update_ids">
                                    <div class="form-floating mb-2">
                                        <div class="">
                                            <select class="form-select py-3 rounded-3" id="assigned_doctor"
                                                name="assigned_doctor" data-placeholder="Dentist" required>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select the doctor name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="updatedata" class="btn btn-book"><i
                                            class="bi bi-pencil-square"></i>
                                        Assign Dentist</button>
                                </div>
                            </form>
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
                            <form action="/dental-appointment-system/pages/admin/api/deleteappointment" method="post">
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
                <!-- End of Main Content -->

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
                if (isset($_SESSION['emailerror'])) {
                    echo "toastr.error('" . $_SESSION['emailerror'] . "', 'Email Error');";
                    unset($_SESSION['emailerror']);
                }
                if (isset($_SESSION['emailsent'])) {
                    echo "toastr.success('" . $_SESSION['emailsent'] . "', 'Email Success');";
                    unset($_SESSION['emailsent']);
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
        <?php
        $query = "SELECT name as title, CONCAT(bookingDate, 'T', preferredTime) as start FROM appointments WHERE status = 'Scheduled' ";
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
                    eventDidMount: function (info) {
                        // Format the date and time
                        var start = info.event.start;
                        var dateTimeStr = start.toLocaleString(); // e.g., "4/30/2025, 10:00:00 AM"

                        // Tooltip content
                        var tooltipContent = `<strong>${info.event.title}</strong><br>${dateTimeStr}`;

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
                    let status = $tr.find('td:eq(7)').data('status');
                    $('#viewStatus').val(status);
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $(document).on('click', '.editbtndentist', function () {
                    // Show the modal
                    $('#editdentistmodal').modal('show');

                    // Get the closest row of the clicked button
                    var $tr = $(this).closest('tr');

                    // Extract text from each table cell in the row
                    var data = $tr.find('td').map(function () {
                        return $(this).text().trim();
                    }).get();

                    console.log(data); // Debugging: check the row data in console

                    // Fill modal inputs with data
                    $('#update_ids').val(data[0]);    // Assuming first column is ID
                    let assigned_doctor = $tr.find('td:eq(8)').data('assigned_doctor');
                    $('#assigned_doctor').val(assigned_doctor);
                });
            });
        </script>
        <script>
            // Replace with the actual path to your PHP script
            fetch('/dental-appointment-system/pages/admin/api/fetch_doctor.php')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('assigned_doctor');
                    select.innerHTML = '<option value="" disabled selected hidden></option>';

                    data.forEach(assigned_doctor => {
                        const option = document.createElement('option');
                        option.value = assigned_doctor;
                        option.textContent = assigned_doctor;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading procedure:', error);
                    document.getElementById('patient_name').innerHTML =
                        '<option value=""disabled selected hidden></option>';
                });
        </script>
        <script>
            $(document).ready(function () {
                $('#assigned_doctor').select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $('#editdentistmodal'),
                    containerCssClass: "select2--medium",
                    dropdownCssClass: "select2--medium"
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