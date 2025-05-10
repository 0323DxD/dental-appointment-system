<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services - Dental Clinic</title>
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
    <!-- Services Section -->
    <div class="container py-5">
      <h1 class="text-center text-primary text fw-bold display-3 animate__animated animate__fadeInUp animate__faster">Our Services</h1>
      <p class="text-center lead mb-5 animate__animated animate__fadeInUp animate__faster">We Offer Wide Range Dental Services</p>
      <?php
      include './conn.php';
      $query = "SELECT * FROM services";
      $query_run = mysqli_query($conn, $query);
      echo '<div class="row d-flex g-4 justify-content-center">';
      while ($items = mysqli_fetch_array($query_run)) {
        echo '<div class="col-md-6">';
        echo '<div class="card h-100 shadow p-2 animate__animated animate__fadeInUp animate__faster">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title text-primary fw-bold fs-3">' . $items['service'] . '</h5>';
        echo '<p class="card-text lead fs-5">' . $items['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
      ?>
    </div>
    <footer class="mx-auto w-100 shadow bg-white border-top">
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