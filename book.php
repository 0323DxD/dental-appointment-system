<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dental Booking Form - Trinity Smiles Dental</title>
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="icon" href="img/clockt.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login-register.css" />
    <link rel="stylesheet" href="css/validate.css">
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- JQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- FullCalendar scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.8/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.8/index.global.min.js'></script>
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
</head>

<body class="bg-gradient-primary">
    <canvas class="background"></canvas>
    <main>
        <nav class="navbar navbar-expand-lg bg-light p-3 shadow sticky-top">
            <div class="container-fluid">
                <a href="index.php">
                    <img src="img/clockt.png" alt="Logo" width="60" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end my-1" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-blue text-light btn-md ms-0 ms-md-2 fw-bold rounded-5 px-3 align-content-center"
                                href="signin.php"><i class="bi bi-person mx-1"></i> SIGN IN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container my-5 animate__animated animate__fadeIn">
            <!-- Outer Row -->
            <div class="row d-flex justify-content-center gap-3">
                <div class="col animate__animated animate__fadeInLeft animate__faster">
                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div id='calendar'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col animate__animated animate__fadeInRight animate__faster">
                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <form action="bookappointment" method="POST" class="needs-validation"
                                            novalidate>
                                            <h1 class="mt-0 text-primary text-start bg-white-3"><b>Dental Booking
                                                    Form</b>
                                            </h1>
                                            <small class="text-justify">Please be informed that this is not yet a
                                                confirmed
                                                booking. Our Dental
                                                Support Team will message you to confirm your appointment. Thank
                                                you.</small>

                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between mt-4">
                                                    <label for="name" class="form-label fs-5 fw-bold text-primary">Name
                                                        <span class="text-danger">*</span></label>
                                                    <div class="text-end text-muted small">
                                                        <span id="charCount">0</span>/100
                                                    </div>
                                                </div>
                                                <input id="name" type="text" name="name" maxlength="100"
                                                    class="form-control form-control-md rounded-3"
                                                    value="<?php echo isset($_SESSION['entered_name']) ? htmlspecialchars($_SESSION['entered_name']) : ''; ?>"
                                                    required oninput="updateCharCount()" />
                                                <div class="invalid-feedback">
                                                    Please enter your name.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="age" class="form-label fs-5 fw-bold text-primary">Age<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <input id="age" type="text" name="age" maxlength="2" max="99" min="1"
                                                    onkeypress="return noSpace(event)"
                                                    value="<?php echo isset($_SESSION['entered_age']) ? htmlspecialchars($_SESSION['entered_age']) : ''; ?>"
                                                    class="form-control form-control-md rounded-3" required />
                                                <div class="invalid-feedback">
                                                    Please enter your age.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label fs-5 fw-bold text-primary">Email
                                                    Address<span class="text-danger"> *</span></label>
                                                <input id="email" type="email" name="email"
                                                    onkeypress="return noSpace(event)"
                                                    value="<?php echo isset($_SESSION['entered_email']) ? htmlspecialchars($_SESSION['entered_email']) : ''; ?>"
                                                    class="form-control form-control-md rounded-3" required />
                                                <div class="invalid-feedback">
                                                    Please enter your email address.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contact"
                                                    class="form-label fs-5 fw-bold text-primary">Contact Number<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <input id="contact" type="text" name="contact" maxlength="11"
                                                    onkeypress="return noSpace(event)"
                                                    value="<?php echo isset($_SESSION['entered_contact']) ? htmlspecialchars($_SESSION['entered_contact']) : ''; ?>"
                                                    class="form-control form-control-md rounded-3" required />
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
                                                    <div class="text-end text-muted small">
                                                        <span id="charTextAreaCount">0</span>/100
                                                    </div>
                                                </div>
                                                <textarea class="form-control rounded-3" id="medicalRecord"
                                                    maxlength="100" style="resize:none" name="medicalRecord" rows="3"
                                                    placeholder="Any allergies, conditions, or medications?" required
                                                    oninput="updateCharTextCount()"></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter any details.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="procedure"
                                                    class="form-label fs-5 fw-bold text-primary">Procedure
                                                    <span class="text-danger">
                                                        *</span></label>
                                                <select class="form-select py-3 rounded-3" id="procedure"
                                                    name="procedure" required>
                                                    <option value="" disabled selected hidden></option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a procedure.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control py-3 rounded-3 readonly-input"
                                                    id="price-display" name="price" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bookingDate"
                                                    class="form-label fs-5 fw-bold text-primary">Preferred
                                                    Date <span class="text-danger">*</span>
                                                </label>
                                                <input class="form-control form-control-md rounded-3" required
                                                    type="date" name="bookingDate"
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
                                                <input class="form-control form-control-md rounded-3" required
                                                    type="time" name="preferredTime"
                                                    value="<?php echo isset($_SESSION['entered_time']) ? htmlspecialchars($_SESSION['entered_time']) : ''; ?>"
                                                    id="preferredTime">
                                                <div class="invalid-feedback">
                                                    Please choose your preferred time.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="insurance" class="form-label fs-5 fw-bold text-primary">With
                                                    Dental Insurance
                                                    / HMO
                                                    <span class="text-danger">
                                                        *</span></label>
                                                <select class="form-select py-3 rounded-3" id="insurance"
                                                    name="insurance" required>
                                                    <option value="" disabled selected hidden></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select your option.
                                                </div>
                                            </div>
                                            <div class="col-12 my-3">
                                                <div class="d-grid gap-2">
                                                    <button type="submit"
                                                        class="btn btn-blue text-light fw-bold rounded-3 bookbtn">
                                                        Confirm Booking
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mx-auto w-100 shadow border-top bg-light">
            <div class="col text-center align-items-center container py-4">
                <span class="text-secondary text-sm">© <span>
                        <script>document.write(new Date().getFullYear())</script>
                    </span> Trinity Smiles Dental | All Rights Reserved.</span>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/script.js"></script>
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
            if (isset($_SESSION['registrationsuccess'])) {
                echo "toastr.success('" . $_SESSION['registrationsuccess'] . "', 'Registration Successful');";
                unset($_SESSION['registrationsuccess']);
            }

            if (isset($_SESSION['registrationfailed'])) {
                echo "toastr.error('" . $_SESSION['registrationfailed'] . "', 'Registration Failed');";
                unset($_SESSION['registrationfailed']);
            }

            if (isset($_SESSION['invalidpassword'])) {
                echo "toastr.error('" . $_SESSION['invalidpassword'] . "', 'Incorrect Password');";
                unset($_SESSION['invalidpassword']);
            }

            if (isset($_SESSION['usernotfound'])) {
                echo "toastr.error('" . $_SESSION['usernotfound'] . "', 'Login Error');";
                unset($_SESSION['usernotfound']);
            }
            ?>
        });
    </script>
    <script>
        document.querySelector('[name="name"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[0-9!@#$%^&*(),.?":{}|<>]/g, '');
        });
        document.querySelector('[name="email"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^a-zA-Z0-9@._-]/g, '');
        });
        document.querySelector('[name="age"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.querySelector('[name="contact"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.querySelector('[name="members"]').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('bookingDate').setAttribute('min', today);
    </script>
    <script>
        $(document).ready(function () {

            $('.bookbtn').on('click', function () {

                // Fill the modal fields from the main form
                $('#modalName').val($('#name').val());
                $('#modalAge').val($('#age').val());
                $('#modalEmail').val($('#email').val());
                $('#modalContact').val($('#contact').val());
                $('#modalMedicalRecord').val($('#medicalRecord').val());
                $('#modalProcedure').val($('#procedure').val());
                $('#modalBookingDate').val($('#bookingDate').val());
                $('#modalInsurance').val($('#insurance').val());

                // Show the confirmation modal
                $('#confirmBookingModal').modal('show');

            });
        });
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
            if (isset($_SESSION['bookingerror'])) {
                echo "toastr.error('" . $_SESSION['bookingerror'] . "', 'Booking Error');";
                unset($_SESSION['bookingerror']);
            }
            ?>
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
                    start: 'title',
                    center: '',
                    end: 'prev,next'
                },
                eventContent: function (info) {
                    var date = info.event.start;
                    var timeStr = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    var dateStr = date.toLocaleDateString();
                    return {
                        html: `<div class="fc-event-time text-primary fw-bold" style="font-size: 12px;">${timeStr}</div>`
                    };
                },
                eventDidMount: function (info) {
                    // Format the date and time
                    var start = info.event.start;
                    var dateTimeStr = start.toLocaleString(); // e.g., "4/30/2025, 10:00:00 AM"

                    // Tooltip content
                    var tooltipContent = `<strong>Appointment</strong><br>${dateTimeStr}`;

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
        window.onload = function () {
            Particles.init({
                selector: ".background",
                maxParticles: 500,
                connectParticles: false,
                color: "#ffffff",
                responsive: [
                    {
                        breakpoint: 768,
                        options: {
                            maxParticles: 500,
                            color: "#1fa6dc",
                            connectParticles: false,
                        },
                    },
                    {
                        breakpoint: 425,
                        options: {
                            maxParticles: 500,
                            color: "#ffffff",
                            connectParticles: false,
                        },
                    },
                    {
                        breakpoint: 320,
                        options: {
                            maxParticles: 500,
                            color: "#ffffff",
                            connectParticles: false,
                        },
                    },
                ],
            });
        };
    </script>
</body>

</html>