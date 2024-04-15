<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 $_SESSION["email"]='';
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
          <li class="nav-item"><a href="../../index.html" class="nav-link text-dark">Home</a></li>
          <li class="nav-item"><a href="./program.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="./gallery.php"class="nav-link text-dark">Gallery</a></li>
          <li class="nav-item"><a href="./product.php" class="nav-link text-dark">Product</a></li>
          <li class="nav-item"><a href="./contact.php" class="nav-link text-dark">Contact</a></li>
          <li class="nav-item"><a href="./login.php" class="nav-link text-success border-bottom border-2 border-success text-success">Sign in</a></li>
        </ul>
      </header>
    </div>
  </div>
  <!-- navbar closed -->
    <!-- User Home -->
    <section class="container my-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="card text-black shadow-lg border-0" style="border-radius: 25px;">
                    <div class="card-body py-md-1">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-10 order-2 order-lg-1">
                                <p class="text-center h2 fw-bold mb-4 mx-1 mx-md-4 mt-4">Sign in</p>
                                <form class="mx-1 mx-md-4" method="post">
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="bi bi-envelope me-3 form-icon" style="color:rgb(34 203 48);"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" class="form-control rounded-4 border-0 p-3 shadow-sm" placeholder="Enter email id" name="email" required/>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <i class="bi bi-shield-lock me-3 form-icon" style="color:rgb(34 203 48);"></i>
                                        <div class="form-outline flex-fill position-relative mb-0">
                                            <div class="input-group shadow-sm rounded-4">
                                                <input type="password" id="form3Example4" class="form-control rounded-4 border-0 p-3 shadow-none" name="pass" placeholder="Enter Password" required />
                                                <button class="btn border border-0 rounded-end-4" type="button" id="showPassword"><i class="bi bi-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>                              
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn text-white rounded-pill px-5 btn-lg" style="background-color:rgb(34 203 48);" name="submit">Login</button>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <span>Not registered yet?</span> 
                                        <a href="./register.php" type="button" class="text-decoration-none px-1"> Create an account <i class=" fw-bold bi-arrow-up-right-circle"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Home Closed -->
<!-- PHP CODE FOR CHECKING THE INSERTED FORM IS CORRECT OR NOT THEN LOGGED IN -->
<?php
if(isset($_POST["submit"]))
{
  $email=$_POST["email"];
  $password=$_POST["pass"];
  
  $sq=mysqli_query($conn,"select * from user where user_email='$email' and user_password='$password'");
  $check=mysqli_num_rows($sq);
  
if($check>0)
{
  $_SESSION["email"] = $email;  
  $_SESSION["pass"] = $password;    
 // header("location: pages/Table.php");

 echo '<script type="text/javascript">
 window.location = "./index2.php"
</script>';
} 
else
{
echo "<script type= 'text/javascript'>alert('Error: "  . "wrong username or password" . $conn->error."');</script>";
}
}
?>
 <!-- footer -->
 <footer class="d-flex container fixed-bottom flex-wrap justify-content-between align-items-center py-2 pt-3 my-3 border-top">
      <div class="col-md-4 d-flex align-items-center">
      <p>Powered by <a href="https://allenzion.com/" class="text-decoration-none">Allen<span class="text-danger">Zion</span></a></p>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
      </ul>
    </footer>
  <!-- Footer closed -->
<script>
    // Toggle password visibility
    document.getElementById("showPassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("form3Example4");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>