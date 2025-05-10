<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - Dental Clinic</title>
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
    <!-- About Content -->
    <div class="container py-5">
      <h1 class="text-center text-primary text fw-bold display-3 animate__animated animate__fadeInUp animate__faster">About Us</h1>
      <p class="lead text-center mb-5 animate__animated animate__fadeInUp animate__faster">
        At Trinity Smiles Dental Clinic, we believe in creating healthy and
        beautiful smiles through compassionate care, advanced technology, and
        expert dental solutions.
      </p>

      <div class="row g-4">
        <div class="col-md-6 animate__animated animate__fadeInLeft animate__faster">
          <h3 class="text-primary fw-bold">Why Visit the Dentist?</h3>
          <ul class="lead">
            <li class="animate__animated animate__fadeInUp animate__faster">
              Prevent plaque buildup and cavities through regular cleanings.
            </li>
            <li class="animate__animated animate__fadeInUp animate__faster">Detect gum disease and oral cancer early.</li>
            <li class="animate__animated animate__fadeInUp animate__faster">Address issues like toothaches, sensitivity, or bad breath.</li>
            <li class="animate__animated animate__fadeInUp animate__faster">
              Maintain overall health – poor oral hygiene is linked to heart
              disease and diabetes.
            </li>
          </ul>
        </div>

        <div class="col-md-6 animate__animated animate__fadeInRight animate__faster">
          <h3 class="text-primary fw-bold ">Importance of Oral Healthcare</h3>
          <ul class="lead">
            <li class="animate__animated animate__fadeInUp animate__faster">
              Brush your teeth at least twice a day using fluoride toothpaste.
            </li>
            <li class="animate__animated animate__fadeInUp animate__faster">Floss daily to remove food and plaque between teeth.</li>
            <li class="animate__animated animate__fadeInU animate__faster">Limit sugary food and drinks which can cause cavities.</li>
            <li class="animate__animated animate__fadeInUp animate__faster">
              Drink water and maintain a healthy diet for strong teeth and gums.
            </li>
          </ul>
        </div>
      </div>

      <div class="mt-5">
        <h3 class="text-primary fw-bold text-center fs-1 animate__animated animate__fadeInUp animate__faster">Our Mission</h3>
        <p class="lead text-center animate__animated animate__fadeInUp animate__faster">
          Our mission is to provide quality dental care in a comfortable and
          welcoming environment. We focus on prevention, education, and
          customized treatment to help our patients achieve lifelong dental
          health.
        </p>
      </div>
    </div>

    <!-- Footer -->
    <footer class="mx-auto w-100 shadow border-top">
      <div class="col align-items-center container py-4">
        <span class="text-secondary text-sm">© <span>
            <script>document.write(new Date().getFullYear())</script>
          </span> Trinity Smiles Dental | All Rights Reserved.</span>
      </div>
    </footer>
  </main>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>