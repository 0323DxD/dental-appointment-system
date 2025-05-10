<?php
session_start();
include 'conn.php';
// Check if form was properly submitted
if (!isset($_SESSION['form_submitted'])) {
    header('Location: index.php');
    exit();
}

// Allow showing the success page
unset($_SESSION['form_submitted']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Success - Trinity Smiles Dental</title>
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="icon" href="img/clockt.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login-register.css" />
    <link rel="stylesheet" href="css/validate.css">
    <!-- JQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="bg-gradient-primary">
    <main>
        <nav class="navbar navbar-expand-lg bg-light p-3 shadow sticky-top">
            <div class="container-fluid">
                <a href="#">
                    <img src="img/clockt.png" alt="Logo" width="60" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div class="text-center">
                                            <h1 class="fw-bold text-primary display-1"><i
                                                    class="bi bi-check-circle-fill"></i></h1>
                                            <h1 class="fw-bold text-primary">Success!</h1>
                                            <p class="fs-5 py-3 lead">Your appointment has been successfully booked. Our
                                                Dental
                                                Support Team will message you to confirm your appointment. Thank
                                                you.</p>
                                            <a href="index.php" class="btn btn-blue text-light fw-bold btn-md rounded-5">
                                                <span class="bi bi-house-fill"></span> Go to Home
                                            </a>
                                        </div>
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
</body>

</html>