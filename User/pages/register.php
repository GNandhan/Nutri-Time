<?php
 include './connect.php';
//  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-time Register</title>
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
          <img src="../images/icon.png" class="icon1 me-2" width="90"></a>
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
  <section class="my-2">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-8">
          <div class="card text-black shadow-lg border-0" style="border-radius: 25px;">
            <div class="card-body py-md-">
              <div class="row justify-content-center">
                <div class="col-md-8 col-lg-12 col-xl-7 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign Up</p>
                  <form class="mx-1 mx-md-4" method="post">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="bi bi-egg-fried me-3 form-icon" style="color:rgb(34 203 48);"></i> <!-- Added form-icon class -->
                      <div class="form-outline flex-fill mb-0">
                        <input type="text"  class="form-control rounded-4 border border-top-0 p-3 shadow-sm" placeholder="Enter Name" name="uname" required/>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="bi bi-geo-alt me-3 form-icon" style="color:rgb(34 203 48);"></i> <!-- Added form-icon class -->
                      <div class="form-outline flex-fill mb-0">
                        <input type="number"  class="form-control rounded-4  border border-top-0 p-3 shadow-sm" placeholder="Enter Phone No" name="uphno" required/>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="bi bi-envelope me-3 form-icon" style="color:rgb(34 203 48);"></i> <!-- Added form-icon class -->
                      <div class="form-outline flex-fill mb-0">
                        <input type="email"  class="form-control rounded-4  border border-top-0 p-3 shadow-sm" placeholder="Enter Email Id" name="uemail" required/>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-3">
                      <i class="bi bi-shield-lock me-3 form-icon" style="color:rgb(34 203 48);"></i>
                      <div class="form-outline flex-fill position-relative mb-0">
                          <div class="input-group shadow-sm rounded-4  border border-top-0">
                              <input type="password" class="form-control rounded-4 border-0 p-3 shadow-none" name="upass" placeholder="Create Password" name="" required />
                              <button class="btn border border-0  rounded-end-4" type="button" id="showPassword"><i class="bi bi-eye"></i></button>
                          </div>
                      </div>
                  </div>
                    <div class="row">
                <div class="col-md mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="bi bi-person-fill me-3 form-icon" style="color:rgb(34 203 48);"></i>
                        <div class="form-outline flex-fill mb-0">
                            <!-- <input type="text" class="form-control rounded-4 border border-top-0 p-3 shadow-sm" placeholder="Enter Gender" name="ugender" required /> -->
                            <select class="form-select rounded-4 border border-top-0 p-3 shadow-sm" name="ugender" required>
                              <option value="" disabled selected>Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="bi bi-geo-alt me-3 form-icon" style="color:rgb(34 203 48);"></i> <!-- Added form-icon class -->
                      <div class="form-outline flex-fill mb-0">
                        <input type="text"  class="form-control rounded-4  border border-top-0 p-3 shadow-sm" placeholder="Enter Location" name="ulocation" required/>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="bi bi-geo-alt me-3 form-icon" style="color:rgb(34 203 48);"></i> <!-- Added form-icon class -->
                      <div class="form-outline flex-fill mb-0">
                        <input type="text"  class="form-control rounded-4  border border-top-0 p-3 shadow-sm" placeholder="Enter Address" name="uaddress" required/>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" class="btn rounded-pill text-white px-5 btn-lg" style="background-color:rgb(34 203 48);" name="submitu" value="Register">
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <span>Already a User?</span> 
                      <a href="./login.php" type="button" class="text-decoration-none px-2 mx-2"> Login now <i class=" fw-bold bi-arrow-up-right-circle"></i></a>
                  </div>
                  </form>
                </div>
                <div class="col-md col-lg col-xl d-flex align-items-center order-1 order-lg-2">
                  <img src="../images/register.png" class="img-fluid" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- User Home Closed -->

<!-- PHP CODE FOR INSERTING THE DATA -->
<?php
    include './connect.php';
    error_reporting(0);

    if(isset($_POST["submitu"]))
    {
        $us_id = $_POST["usid"];
        $us_name = $_POST["uname"];
        $us_phno = $_POST["uphno"];
        $us_email = $_POST["uemail"];
        $us_pass = $_POST["upass"];
        $us_gender = $_POST["ugender"];
        $us_location = $_POST["ulocation"];
        $us_address = $_POST["uaddress"];

 // Fetch the shake ID from the form
 $sh_id = $_POST["shid"];

 if ($sh_id == '') {
   $sql = mysqli_query($conn, "INSERT INTO customer (cust_name, cust_phno, cust_email, cust_password, cust_gender, cust_address, cust_city)
                                VALUES ('$us_name','$us_phno','$us_email','$us_pass','$us_gender','$us_address','$us_location')");
 } else {
   // Update shake
   $sql = mysqli_query($conn, "UPDATE customer SET cust_name='$us_name', cust_phno='$us_phno', cust_email='$us_email', cust_password='$us_pass', cust_gender='$us_gender', cust_address='$us_address', cust_city='$us_location' WHERE cust_id='$sh_id'");
 }
 if ($sql == TRUE) {
  echo "<script>alert('User registration successfully.'); window.location.href = './login.php';</script>";
  exit; // Prevent further execution
 } else {
  echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
 }
}


?>

 <!-- footer -->
 <footer class="d-flex container flex-wrap justify-content-between align-items-center py-2 my-3 border-top">
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