<?php
session_start();
require_once 'conn.php'; // Secure database connection

// Redirect logged-in users to their respective dashboard
if (isset($_SESSION['username'])) {
    switch ($_SESSION['role']) {
        case 'Dentist':
            header("Location: /dental-appointment-system/pages/dentist/dashboard.php");
            break;
        case 'Patient':
            header("Location: /dental-appointment-system/pages/patient/appointments.php");
            break;
        case 'Administrator':
            header("Location: /dental-appointment-system/pages/admin/dashboard.php");
            break;
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In - Trinity Smiles Dental</title>
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="icon" href="img/clockt.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login-register.css" />
    <link rel="stylesheet" href="css/validate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- JQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
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
                  href="book.php"><i class="bi bi-calendar mx-1"></i> BOOK NOW</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 col-sm-12 animate__animated animate__fadeIn animate__faster">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <h1 class="mt-0 text-primary text-center bg-white py-3"><b>Sign In</b></h1>
                                        <form action="login" method="POST" class="needs-validation" novalidate>
                                            <input id="username" type="text" name="username"
                                                value="<?php echo isset($_SESSION['entered_username']) ? htmlspecialchars($_SESSION['entered_username']) : ''; ?>"
                                                onkeypress="return noSpace(event)"
                                                class="form-control form-control-md rounded-3" value=""
                                                placeholder="Username" required />
                                            <div class="invalid-feedback">
                                                Please enter your username!
                                            </div>
                                            <input id="password" type="password" name="password"
                                                onkeypress="return noSpace(event)"
                                                class="form-control form-control-md rounded-3 mt-2"
                                                placeholder="Password" required />
                                            <div class="invalid-feedback">
                                                Please enter your password!
                                            </div>
                                            <div class="col-12 my-3">
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn rounded-3" id="loginButton">
                                                        <span id="loader"
                                                            class="spinner-border spinner-border-sm d-none"
                                                            role="status" aria-hidden="true"></span>
                                                        <span id="buttonText">Sign In</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <p class="mt-3 text-center">
                                                Don't have an account? <a
                                                    class="text-decoration-none text-primary fw-bold"
                                                    href="signup.php">Sign Up</a>
                                            </p>
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
            if (isset($_SESSION['invalidpassword'])) {
                echo "toastr.error('" . $_SESSION['invalidpassword'] . "', 'Incorrect Password');";
                unset($_SESSION['invalidpassword']);
            }

            if (isset($_SESSION['usernotfound'])) {
                echo "toastr.error('" . $_SESSION['usernotfound'] . "', 'Login Error');";
                unset($_SESSION['usernotfound']);
            }
            if (isset($_SESSION['registrationsuccess'])) {
                echo "toastr.success('" . $_SESSION['registrationsuccess'] . "', 'Registration Successful');";
                unset($_SESSION['registrationsuccess']);
            }
            ?>
        });
    </script>
    <script>
        // Only run if the register button exists on the page
        const btn = document.getElementById("loginButton");

        if (btn) {
            btn.onclick = function (event) {
                event.preventDefault();

                let loader = document.getElementById("loader");
                let buttonText = document.getElementById("buttonText");
                let form = document.querySelector(".needs-validation");

                if (!form.checkValidity()) {
                    form.classList.add("was-validated");
                    return;
                }

                btn.disabled = true;
                loader.classList.remove("d-none");
                buttonText.textContent = "Signing in...";

                setTimeout(() => {
                    form.submit();
                }, 1000);
            };
        }
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