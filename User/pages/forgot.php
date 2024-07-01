<?php
include './connect.php';
error_reporting(0);
session_start();
$_SESSION["email"] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-time Login</title>
    <link rel="stylesheet" href="User/static/home.css">
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');

        body {
            font-family: "DM Sans";
        }

        @import url('https://fonts.googleapis.com/css2?family=Allison&display=swap');

        .allison-regular {
            font-family: "Allison";
            font-weight: normal;
            font-style: normal;
        }

        .nav-link {
            position: relative;
            text-decoration: none;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover::after {
            background-color: #22CB30;
        }

        .form-icon {
            font-size: 1.2rem;
        }

        .footer-container {
            position: fixed;
            bottom: 0;
            background-color: white;
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
                    <li class="nav-item"><a href="./login.php" class="nav-link text-success  border-success text-success">Sign in</a></li>
                </ul>
            </header>
        </div>
    </div>
    <!-- navbar closed -->
    <!-- User Home -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-6">
                <section class="my-4">
                    <div class="card text-black shadow-lg border-0" style="border-radius: 25px;">
                        <div class="card-body py-md-1">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-10 order-2 order-lg-1">
                                    <p class="text-center h2 fw-bold mb-4 mx-1 mx-md-4 mt-4">Forgot Password?</p>
                                    <form class="mx-1 mx-md-4" method="post">
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="bi bi-envelope me-3 form-icon" style="color:rgb(34 203 48);"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" class="form-control rounded-4 border-0 p-3 shadow-sm" placeholder="Enter email id" name="email" required />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn text-white rounded-pill px-5 btn-lg" style="background-color:rgb(34 203 48);" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- User Home Closed -->
            </div>
        </div>
    </div>

    <!-- PHP CODE FOR CHECKING THE INSERTED FORM IS CORRECT OR NOT THEN LOGGED IN -->
    <?php
    // Check if form is submitted
    if (isset($_POST["submit"])) {
        $email = $_POST['email'];

        // Query to select password based on email using prepared statement
        $query = "SELECT cust_password FROM customer WHERE cust_email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $password);
            mysqli_stmt_fetch($stmt);

            // Send email containing the password reset link
            $to = $email;
            $subject = "Password Recovery";
            $message = "Your password is: $password";
            $headers = "From: your@gowrinandhan95@gmail.com"; // Replace with your email

            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Password sent to your email.');</script>";
            } else {
                echo "<script>alert('Failed to send password.');</script>";
            }
        } else {
            echo "<script>alert('Email not found.');</script>";
        }

        mysqli_stmt_close($stmt);
    }
    ?>
    <!-- footer -->
    <footer class="d-flex container fixed-bottom flex-wrap justify-content-between align-items-center py-2 pt-3 my-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <p>Powered by <a href="https://zionitedu.com/" class="text-decoration-none"><span class="text-danger">Zion</span> IT Company</a></p>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
        </ul>
    </footer>
    <!-- Footer closed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>