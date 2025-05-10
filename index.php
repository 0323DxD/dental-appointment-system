<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Trinity Smiles Dental</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="img/clockt.png" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
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
    <section class="container col-xxl-8 px-4 py-5 animate__animated animate__fadeIn animate__faster">
      <div class="row flex-lg-row-reverse g-5 justify-content-center align-items-center">
        <div class="col-10 col-sm-8 col-lg-6 order-md-1 order-2 animate__animated animate__backInRight animate__fast">
          <img src="img/image-1.png" class="d-flex mx-lg-auto img-fluid" width="450" loading="lazy" />
        </div>
        <div class="col-lg-6 order-md-2 order-1 animate__animated animate__backInLeft animate__fast">
          <p class="display-4 lh-1 text-primary text-center text-lg-start">
            Specialized<br /><span class="fw-bold display-1">Dental Care</span><br /><span class="display-6">for All
              Your Needs</span>
          </p>
          <div class="d-flex justify-content-center justify-content-md-center justify-content-lg-start">
            <a href="#about" class="btn btn-blue text-light btn-lg rounded-5 px-4 py-2 fw-bold">
              About Us <i class="bi bi-arrow-down"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid bg-blue about">
      <div class="container py-5" id="about">
        <div class="row d-flex g-5 justify-content-center align-items-center py-3">
          <div class="col-10 col-sm-8 col-lg-6 order-md-1 order-2 animate__animated animate__fadeInLeft animate__faster">
            <img src="img/image-2.png" class="d-block mx-lg-auto img-fluid" width="450" loading="lazy" />
          </div>
          <div class="col-auto col-lg-6 order-md-2 order-1 animate__animated animate__fadeInRight animate__faster">
            <div class="row justify-content-center">
              <p class="fs-3 lh-1 text-white text-center text-lg-start">
                Experience<br /><span class="fw-bold display-3">World Class</span><br /><span class="display-5">Dental
                  Care</span>
              </p>
              <hr style="width: 95%" />
              <p class="text-white">
                Our dentists are specialized in different fields to address
                all your dental concerns and to make sure that you will be
                provided with unmatched care and safety.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid projects">
      <div class="container py-5">
        <div class="row d-flex g-2 justify-content-between align-items-center">
          <div class="col-12 col-md-8">
            <p class="fs-5 lh-1 text-primary text-center text-lg-start">
              We Solve Real Problems
              <br />
              <span class="fw-bold display-5">What Can We Do For You?</span>
              <br />
            </p>
          </div>
          <div class="col-md-4">
            <div class="d-flex justify-content-center justify-content-md-end">
              <a href="services.php" class="btn btn-blue text-light btn-lg rounded-5 px-4 py-2">
                More Services <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid bg-blue about">
      <div class="container py-5" id="about">
        <div class="row d-flex g-5 justify-content-center align-items-center py-3">
          <div class="col-auto col-lg-7 animate__animated animate__fadeInLeft animate__faster">
            <div class="row justify-content-center">
              <p class="lh-1 text-white text-center text-lg-start fw-bold display-3">Clinic Schedule
              </p>
            </div>
          </div>
          <div class="col-10 col-sm-8 col-lg-5 animate__animated animate__fadeInRight animate__faster ">
            <table class="fs-2 fw-bold text-light" style="width:100%">
              <tbody>
                <?php
                include 'conn.php';
                $query = "SELECT * FROM schedule";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $items) {
                    ?>
                    <tr>
                      <td class="text-uppercase">
                        <?= $items['day'] ?>
                      </td>
                      <td class="text-center">
                        <?= date("g A", strtotime($items['startTime'])) . " - " . date("g A", strtotime($items['endTime'])); ?>
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
    </section>
    <footer class="mx-auto w-100 shadow border-top footer">
      <div class="col align-items-center container py-4">
        <span class="text-secondary text-sm">©
          <span>
            <script>
              document.write(new Date().getFullYear());
            </script>
          </span>
          Trinity Smiles Dental | All Rights Reserved.</span>
      </div>
    </footer>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.onload = function () {
      Particles.init({
        selector: ".background",
        maxParticles: 80,
        connectParticles: true,
        color: "#1fa6dc",
        responsive: [
          {
            breakpoint: 768,
            options: {
              maxParticles: 80,
              color: "#1fa6dc",
              connectParticles: true,
            },
          },
          {
            breakpoint: 425,
            options: {
              maxParticles: 80,
              color: "#1fa6dc",
              connectParticles: true,
            },
          },
          {
            breakpoint: 320,
            options: {
              maxParticles: 80,
              color: "#1fa6dc",
              connectParticles: true,
            },
          },
        ],
      });
    };
  </script>
    <script>
    ScrollReveal().reveal('.background', { reset: true });
    ScrollReveal().reveal('.hero', { reset: true, origin: 'bottom', distance: '50px', duration: 500 });
    ScrollReveal().reveal('.about', { reset: true, origin: 'bottom', distance: '0px', duration: 500 });
    ScrollReveal().reveal('.projects', { reset: true, origin: 'bottom', distance: '0px', duration: 500 });
    ScrollReveal().reveal('.system', { reset: true, origin: 'bottom', distance: '0px', duration: 1000 });
    ScrollReveal().reveal('.contact', { reset: true, origin: 'bottom', distance: '0px', duration: 500 });
    ScrollReveal().reveal('.footer', { reset: true, origin: 'bottom', distance: '0px', duration: 500 });
  </script>
</body>

</html>