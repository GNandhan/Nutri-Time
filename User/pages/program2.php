<?php
include './connect.php';
error_reporting(0);
session_start();
if ($_SESSION["email"] == "") {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-time Program</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Example using Font Awesome for the play button icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

        body {
            background-color: rgb(250, 250, 250);
            font-family: "Outfit", sans-serif;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid bg-white shadow-sm">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-2 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="../images/icon.png" class="icon1 me-2" width="90">
                </a>
                <ul class="nav">
                    <li class="nav-item"><a href="./index2.php" class="nav-link text-dark">Home</a></li>
                    <li class="nav-item"><a href="./program2.php" class="nav-link text-success border-bottom border-2 border-success text-success">Program</a></li>
                    <li class="nav-item"><a href="./gallery2.php" class="nav-link text-dark">Gallery</a></li>
                    <li class="nav-item"><a href="./product2.php" class="nav-link text-dark">Product</a></li>
                    <li class="nav-item"><a href="./contact2.php" class="nav-link text-dark">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person" width="24" height="24"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow rounded-4" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="./logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </header>
        </div>
    </div>
    <!-- navbar closed -->
    <!-- Program cards -->
    <div class="container">
        <div class="row">
            <div class="h2 py-4 px-5 border-start bg-white rounded-5 shadow">Programs</div>
            <div class="card border-0 shadow-lg rounded-5">
                <div class="row text-center p-4">
                    <?php
                    // Define an array of colors
                    $colors = array('#C5EBAA', '#E1F0DA', '#EED3D9', '#C6DCBA', '#D4E2D4', '#EEE0C9', '#C2DEDC', '#96B6C5', '#F5F0BB', '#F1F7B5');
                    $sql = mysqli_query($conn, "SELECT * FROM program ORDER BY program_id ");
                    $color_index = 0; // Start with the first color
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $prg_name = $row['program_name'];
                        $prg_img = $row['program_img'];
                        $prg_purp = $row['program_purpose'];
                        $prg_dur = $row['program_duration'];
                        $prg_age = $row['program_age'];
                        $prg_con = $row['program_condition'];
                        $prg_mode = $row['program_mode'];
                        // Get the color for this card
                        $color = $colors[$color_index % count($colors)]; // Use modulo to loop through colors
                        // Increment color index for next card
                        $color_index++;
                    ?>
                        <div class="col-lg-3 col-md col-sm-6 col my-5 ">
                            <div class="card shadow rounded-5 pt-5 border-0 h-100" style="width: 14rem; position: relative; background-color: <?php echo $color; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="image-container rounded-circle overflow-hidden border border-3 border-light-subtle shadow z-3 position-absolute" style="width: 120px; height: 120px; margin: auto; top: -60px; left: 0; right: 0; background-image: url('../../Admin/images/program/<?php echo $prg_img; ?>'); background-size: cover; background-position: center;"></div>
                                <div class="card-body pt-4">
                                    <h5 class="card-title text-uppercase"><?php echo $prg_name; ?></h5>
                                    <p class="card-text"><?php echo $prg_con; ?></p>
                                </div>
                                <div class="card-footer text-secondary bg-transparent border-top"><?php echo $prg_mode; ?></div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $prg_name; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../../Admin/images/program/<?php echo $prg_img; ?>" class="rounded-4" alt="Product Image" width="100%">
                                        <div>Program name: <?php echo $prg_name; ?></div>
                                        <div><?php echo $prg_purp; ?></div>
                                        <div><?php echo $prg_dur; ?></div>
                                        <div><?php echo $prg_age; ?></div>
                                        <div><?php echo $prg_con; ?></div>
                                        <div><?php echo $prg_mode; ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-white" style="background-color: rgb(44, 202, 44);" data-bs-dismiss="modal" onclick="sendRequest()">Request</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal closed -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Program cards -->
    <!-- footer -->
    <footer class="d-flex flex-wrap container justify-content-between fixed-bottom align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <p>Powered by <a href="https://allenzion.com/" class="text-decoration-none">Allen<span class="text-danger">Zion</span></a></p>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
        </ul>
    </footer>
    <!-- Define the Bootstrap toast message with updated positioning -->
    <div class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 1050">
        <div class="toast" id="requestToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Request sent successfully
            </div>
        </div>
    </div>

    <!-- navbar, Program cards, and footer sections remain unchanged -->

    <script>
        function sendRequest() {
            // Show Bootstrap toast message
            var toastEl = document.getElementById('requestToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();

            // Redirect after a delay
            setTimeout(function() {
                window.location.href = './program.php';
            }, 2000); // 2000 milliseconds = 2 seconds
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>