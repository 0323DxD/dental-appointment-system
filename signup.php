<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up - Trinity Smiles Dental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/login-register.css">
  <link rel="stylesheet" href="css/validate.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" href="img/clockt.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- JQuery JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
  <!-- Toastr CSS & JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="bg-gradient-primary">
  <main>
  <canvas class="background"></canvas>
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
                    <h1 class="mt-0 text-primary text-center bg-white py-3"><b>Sign Up</b></h1>
                    <form action="/dental-appointment-system/createuser" method="post" class="needs-validation" novalidate>
                      <input id="name" type="text" name="name"
                        value="<?php echo isset($_SESSION['entered_name']) ? htmlspecialchars($_SESSION['entered_name']) : ''; ?>"
                        onkeypress="return noNumber(event)"class="form-control form-control-md rounded-3" value=""
                        placeholder="Name" required />
                      <div class="invalid-feedback">
                        Please enter your name.
                      </div>
                      <input id="email" type="email" name="email"
                        value="<?php echo isset($_SESSION['entered_email']) ? htmlspecialchars($_SESSION['entered_email']) : ''; ?>"
                        onkeypress="return noSpace(event)" class="form-control form-control-md rounded-3 mt-2" value=""
                        placeholder="Email Address" required />
                      <div class="invalid-feedback">
                        Please enter your email address.
                      </div>
                      <input id="username" type="text" name="username"
                        value="<?php echo isset($_SESSION['entered_username']) ? htmlspecialchars($_SESSION['entered_username']) : ''; ?>"
                        onkeypress="return noSpace(event)" class="form-control form-control-md rounded-3 mt-2" value=""
                        placeholder="Username" required />
                      <div class="invalid-feedback">
                        Please enter your username.
                      </div>
                      <input id="password" type="password" name="password" onkeypress="return noSpace(event)"
                        class="form-control form-control-md rounded-3 mt-2" placeholder="Password" required />
                      <div class="invalid-feedback">
                        Please enter your password.
                      </div>
                      <input id="phone" type="text" name="phone"
                        value="<?php echo isset($_SESSION['entered_phone']) ? htmlspecialchars($_SESSION['entered_phone']) : ''; ?>"
                        onkeypress="return noLetterOrSymbol(event)" class="form-control form-control-md rounded-3 mt-2" value=""
                        placeholder="Phone Number" required maxlength="11"/>
                      <div class="invalid-feedback">
                        Please enter your phone number.
                      </div>
                      <!-- /.col -->
                      <div class="col-12 my-3">
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn rounded-3" id="registerButton">
                            <span id="loader" class="spinner-border spinner-border-sm d-none" role="status"
                              aria-hidden="true"></span>
                            <span id="buttonText">Sign Up</span>
                          </button>
                        </div>
                        <hr>
                        <p class="mt-3 text-center">
                          Already have an account? <a class="text-decoration-none fw-bold text-primary"
                            href="signin.php">Sign In</a>
                        </p>
                      </div>
                      <!-- /.col -->
                      <!--end::Row-->
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
      if (isset($_SESSION['registrationfailed'])) {
        echo "toastr.error('" . $_SESSION['registrationfailed'] . "', 'Registration Failed');";
        unset($_SESSION['registrationfailed']);
      }
      ?>
    });
  </script>
  <script>
    // Only run if the register button exists on the page
    const btn = document.getElementById("registerButton");

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
        buttonText.textContent = "Signing up...";

        setTimeout(() => {
          form.submit();
        }, 1000);
      };
    }
  </script>
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)-->

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