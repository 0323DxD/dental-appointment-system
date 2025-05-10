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

    <title>Settings - Trinity Smiles Dental</title>

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
    <link href="/dental-appointment-system/css/validate.css" rel="stylesheet">
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
                                    class=" text-primary mr-2 small font-weight-bold">Dr. <?php echo getFullname(); ?><br><span
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
                        <h1 class="h3 mb-0 text-primary font-weight-bold">Settings</h1>
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
                    <div class="card mb-3">
                        <div class="card-header fw-bold text-primary">
                            <i class="bi bi-person-gear"></i> Change Username
                        </div>
                        <div class="card-body fs-5 fw-bold mb-0 d-flex justify-content-between align-items-center">
                            <p class="text-primary" style="margin-bottom: 0px;">Username:
                                <?php echo $row['username'] ?><br><span style="font-size: 15px;"
                                    class="text-secondary fw-normal fst-italic">
                                    <?php
                                    $lastUsernameChange = new DateTime($row['last_username_change']);
                                    $now = new DateTime();

                                    $interval = $lastUsernameChange->diff($now);
                                    if ($interval->y > 0) {
                                        if ($interval->y == 1) {
                                            echo "You changed your username " . $interval->format('%y year') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%y years') . " ago.";
                                        }
                                    } elseif ($interval->m > 0) {
                                        if ($interval->m == 1) {
                                            echo "You changed your username " . $interval->format('%m month') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%m months') . " ago.";
                                        }
                                    } elseif ($interval->d > 0) {
                                        if ($interval->d == 1) {
                                            echo "You changed your username " . $interval->format('%d day') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%d days') . " ago.";
                                        }
                                    } elseif ($interval->h > 0) {
                                        if ($interval->h == 1) {
                                            echo "You changed your username " . $interval->format('%h hour') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%h hours') . " ago.";
                                        }
                                    } elseif ($interval->i > 0) {
                                        if ($interval->i == 1) {
                                            echo "You changed your username " . $interval->format('%i minute') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%i minutes') . " ago.";
                                        }
                                    } else {
                                        if ($interval->s == 1) {
                                            echo "You changed your username " . $interval->format('%s second') . " ago.";
                                        } else {
                                            echo "You changed your username " . $interval->format('%s seconds') . " ago.";
                                        }
                                    } ?>
                            </p>
                            <button type="button" class="btn btn-book editbtn" data-bs-toggle="modal"
                                data-bs-target="#editUsernameModal">
                                <i class="bi bi-person-gear"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header fw-bold text-primary">
                            <i class="bi bi-key-fill"></i> Change Password
                        </div>
                        <div class="card-body fs-5 fw-bold mb-0 d-flex justify-content-between align-items-center">
                            <p class="text-primary" style="margin-bottom: 0px;">Password
                                <br><span style="font-size: 15px;" class="text-secondary fw-normal fst-italic">
                                    <?php
                                    $lastPasswordChange = new DateTime($row['last_password_change']);
                                    $now = new DateTime();

                                    $interval = $lastPasswordChange->diff($now);
                                    if ($interval->y > 0) {
                                        if ($interval->y == 1) {
                                            echo "You changed your password " . $interval->format('%y year') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%y years') . " ago.";
                                        }
                                    } elseif ($interval->m > 0) {
                                        if ($interval->m == 1) {
                                            echo "You changed your password " . $interval->format('%m month') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%m months') . " ago.";
                                        }
                                    } elseif ($interval->d > 0) {
                                        if ($interval->d == 1) {
                                            echo "You changed your password " . $interval->format('%d day') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%d days') . " ago.";
                                        }
                                    } elseif ($interval->h > 0) {
                                        if ($interval->h == 1) {
                                            echo "You changed your password " . $interval->format('%h hour') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%h hours') . " ago.";
                                        }
                                    } elseif ($interval->i > 0) {
                                        if ($interval->i == 1) {
                                            echo "You changed your password " . $interval->format('%i minute') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%i minutes') . " ago.";
                                        }
                                    } else {
                                        if ($interval->s == 1) {
                                            echo "You changed your password " . $interval->format('%s second') . " ago.";
                                        } else {
                                            echo "You changed your password " . $interval->format('%s seconds') . " ago.";
                                        }
                                    } ?>
                            </p>
                            <button type="button" class="btn btn-book editpassbtn" data-bs-toggle="modal"
                                data-bs-target="#editPasswordModal">
                                <i class="bi bi-key-fill"></i> Edit
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Edit Username Modal -->
                <div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUsernameModalLabel"><i
                                        class="bi bi-person-fill-gear"></i> Change Username</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="forms needs-validation" method="POST" action="/dental-appointment-system/pages/dentist/api/changeusername"
                                    novalidate="">
                                    <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo $row['username']; ?>"
                                            name="username" id="editUsername" required>
                                        <label for="username" class="form-label">Username</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updateusername" class="btn btn-book"><i
                                        class="bi bi-person-fill-gear"></i> Change Username</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Password Modal -->
                <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPasswordModalLabel"><i class="bi bi-key-fill"></i>
                                    Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="forms needs-validation" method="POST" action="dental-appointment-system/pages/dentist/api/changepassword"
                                    novalidate="">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="updatepassword_id"
                                        id="updatepassword_id">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" name="password" id="editPassword"
                                            required>
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updatepassword" class="btn btn-book">
                                    <i class="bi bi-key-fill"></i> Change Password</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white shadow border-top mt-auto">
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
                if (isset($_SESSION['updateerror'])) {
                    echo "toastr.error('" . $_SESSION['updateerror'] . "', 'Update Error');";
                    unset($_SESSION['updateerror']);
                }
                if (isset($_SESSION['updatesuccess'])) {
                    echo "toastr.success('" . $_SESSION['updatesuccess'] . "', 'Update Success');";
                    unset($_SESSION['updatesuccess']);
                }
                ?>
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.editbtn').on('click', function () {

                    $('#editUsernameModal').modal('show');
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.editpassbtn').on('click', function () {

                    $('#editPasswordModal').modal('show');
                });
            });
        </script>
</body>

</html>