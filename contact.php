<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact & FAQ - Dental Clinic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="icon" href="img/clockt.png" type="image/x-icon" />
</head>

<body>
  <main>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light p-3 shadow sticky-top">
      <div class="container-fluid">
        <a href="#">
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
            <div class="d-flex gap-2 ms-0 ms-md-2">
              <li class="nav-item">
                <a class="btn btn-blue text-light btn-md ms-0 fw-bold rounded-5 px-3 align-content-center"
                  href="signin.php"><i class="bi bi-person mx-1"></i> SIGN IN</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-blue text-light btn-md ms-0 fw-bold rounded-5 px-3 align-content-center"
                  href="book.php"><i class="bi bi-calendar mx-1"></i> BOOK NOW</a>
              </li>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Content -->
    <div class="container py-5">
      <h1 class="text-center text-primary text fw-bold display-3 animate__animated animate__fadeInUp animate__faster">Contact Us</h1>
      <p class="lead text-center mb-5 animate__animated animate__fadeInUp animate__faster">
        We would Be Happy To Assist You
      </p>
      <div class="container">
        <section class="mb-5">
          <div class="row d-flex flex-wrap mb-3 row g-3 justify-content-center">
            <div class="col align-items-stretch text-uppercase text-center animate__animated animate__fadeInUp animate__faster">
              <div class="card h-100 shadow">
                <div class="card-body">
                  <h1 class="fw-bold text-primary display-1"><i class="bi bi-geo-alt"></i></h1>
                  <h3 class="text-center text-primary"><strong>Clinic Address</strong></h3>
                  <h5 class="text-center mt-0 lead">123 Smile Street, Happy Town, Metro
                    City
                  </h5>
                </div>
              </div>
            </div>
            <div class="col align-items-stretch text-uppercase text-center animate__animated animate__fadeInUp animate__faster">
              <div class="card h-100 shadow">
                <div class="card-body">
                  <h1 class="fw-bold text-primary display-1"><i class="bi bi-telephone"></i></h1>
                  <h3 class="text-center text-primary"><strong>Phone</strong></h3>
                  <h5 class="text-center mt-0 lead">+63 912 345 6789
                  </h5>
                </div>
              </div>
            </div>
            <div class="col align-items-stretch text-uppercase text-center animate__animated animate__fadeInUp animate__faster">
              <div class="card h-100 shadow">
                <div class="card-body">
                  <h1 class="fw-bold text-primary display-1"><i class="bi bi-envelope-at"></i></h1>
                  <h3 class="text-center text-primary"><strong>Email Address</strong></h3>
                  <h5 class="text-center mt-0 lead">trinitysmilesdc@gmail.com
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <h2 class="text-center text-primary text fw-bold display-6 mb-4 animate__animated animate__fadeInUp animate__faster">Frequently Asked Questions</h2>
      <div class="accordion shadow animate__animated animate__fadeInUp animate__faster" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
              How do I book an appointment?
            </button>
          </h2>
          <div id="faq1" class="accordion-collapse collapse">
            <div class="accordion-body">
              You can book an appointment via our website by going to the
              <a class="text-primary fw-bold text-decoration-none" href="book">Dental Booking Form</a> page and filling
              out the form or kindly click the <strong class="text-primary">Book Now</strong> button.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            What should I bring to my appointment?
            </button>
          </h2>
          <div id="faq2" class="accordion-collapse collapse">
            <div class="accordion-body">
            Please bring a valid ID, insurance card (if applicable), and any previous dental records if available.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
              Do you accept walk-ins?
            </button>
          </h2>
          <div id="faq3" class="accordion-collapse collapse">
            <div class="accordion-body">
              Yes, we do accept walk-ins but it depends on availability. Booking
              ahead is highly recommended.
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="mx-auto w-100 shadow border-top">
      <div class="col align-items-center container py-4">
        <span class="text-secondary text-sm">© <span>
            <script>document.write(new Date().getFullYear())</script>
          </span> Trinity Smiles Dental | All Rights Reserved.</span>
      </div>
    </footer>
  </main>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>