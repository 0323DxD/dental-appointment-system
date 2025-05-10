<?php
http_response_code(403);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - Dental Clinic</title>
    <title>403 Forbidden | ROAST-MS</title>
    <link rel="icon" href="/dental-appointment-system/img/clockt.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="/dental-appointment-system/css/error-pages.css" />
    <link rel="stylesheet" href="/dental-appointment-system/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
</head>

<body>
    <!-- Main Container -->
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="col-lg-8 col-md-4">
            <div class="text-center">
                <h1 class="text-primary animate__animated animate__tada fw-bold" style="font-size:150px">403</h1>
                <h2 class="fw-bold text-primary display-5">Forbidden</h2>
                <p class="fs-5 py-3 lead">You don't have permission to access this page.</p>
                <button type="submit" onclick="goBack()" class="btn btn-md rounded-5">
                    <span class="bi bi-arrow-left"></span> Go Back
                </button>
            </div>
        </div>
    </div>

    <script src="/dental-appointment-system/js/script.js"></script>
</body>

</html>