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

    <title>Dashboard - Trinity Smiles Dental</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/8c6de87254.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/dental-appointment-system/img/clockt.png" type="image/x-icon" />
    <!-- Custom styles for this template-->
    <link href="/dental-appointment-system/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dental-appointment-system/vendor/apexcharts/dist/apexcharts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="/dental-appointment-system/css/dashboard.css">
    <script src="/dental-appointment-system/vendor/jquery/jquery.min.js"></script>
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-blue sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="/dental-appointment-system/img/clockt.png" alt="Logo" width="60" class="d-inline-block align-text-top">
                </div>
                <div class="sidebar-brand-text mx-3">TDS DAS</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
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
            <li class="nav-item">
                <a class="nav-link" href="prescription.php">
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

                                <span
                                    class=" text-primary mr-2 small font-weight-bold">Dr. <?php echo getFullname(); ?><br><span class="text-secondary font-weight-light"><?php echo getRole(); ?></span></span>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Appointments Today Card -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Appointments Today</div>
                                            <div class="h5 mb-0 font-weight-bold text-primary ">
                                                <span id="count-today">
                                                    Loading...
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-day fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cancelled Appointments Card -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Cancelled Appointments</div>
                                            <div class="h5 mb-0 font-weight-bold text-primary"><span
                                                    id="count-cancelled">
                                                    Loading...
                                                </span></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-xmark fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Appointments Card -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Upcoming Appointments
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-primary"><span
                                                            id="count-upcoming">
                                                            Loading...
                                                        </span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-check fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- New Patients Card -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Patients (7 Days)</div>
                                            <div class="h5 mb-0 font-weight-bold text-primary"><span id="count-new">
                                                    Loading...
                                                </span></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-user fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7 mb-3">
                            <div class="card shadow h-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Appointments by Day</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="appointmentsByDayChart"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5 mb-3">
                            <div class="card shadow h-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Appointment Status Distribution</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="appointmentStatusPieChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

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

    <script>
        // Function to load summary data from the PHP backend
        function loadSummary() {
            $.getJSON("/dental-appointment-system/get_summary_counts.php", function (data) {
                // Update the values in the dashboard cards
                $('#count-today').text(data.today_appointments);
                $('#count-new').text(data.new_patients);
                $('#count-cancelled').text(data.cancelled);
                $('#count-upcoming').text(data.upcoming_appointments);
            }).fail(function () {
                // Handle error in case of a failed AJAX request
                $('#count-today, #count-new, #count-cancelled, #count-upcoming').text('Error loading data');
            });
        }

        // Load the summary data when the page loads
        $(document).ready(function () {
            loadSummary();
            setInterval(loadSummary, 5000); // Update every 5 seconds
        });
    </script>
</body>

</html>