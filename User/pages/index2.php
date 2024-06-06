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
  <title>Nutri-time Index</title>
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  <!-- Example using Font Awesome for the play button icon -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

    body {
      font-family: "Outfit", sans-serif;
      background-image: url(../images/bg.png);
      background-repeat: no-repeat;
      background-size: cover;
    }

    .text-success {
      color: rgb(8, 177, 22) !important;
    }

    /* Slick------------------------------------- */
    .slick-slide img {
      width: 100%;
    }

    .slick-slider {
      position: relative;
      display: block;
      box-sizing: border-box;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-touch-callout: none;
      -khtml-user-select: none;
      -ms-touch-action: pan-y;
      touch-action: pan-y;
      -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
      position: relative;
      display: block;
      overflow: hidden;
      margin: 0;
      padding: 0;
    }

    .slick-list:focus {
      outline: none;
    }

    .slick-list.dragging {
      cursor: pointer;
      cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
      -webkit-transform: translate3d(0, 0, 0);
      -moz-transform: translate3d(0, 0, 0);
      -ms-transform: translate3d(0, 0, 0);
      -o-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
    }

    .slick-track {
      position: relative;
      top: 0;
      left: 0;
      display: block;
    }

    .slick-track:before,
    .slick-track:after {
      display: table;
      content: '';
    }

    .slick-track:after {
      clear: both;
    }

    .slick-loading .slick-track {
      visibility: hidden;
    }

    .slick-slide {
      display: none;
      float: left;
      height: 100%;
      min-height: 1px;
    }

    [dir='rtl'] .slick-slide {
      float: right;
    }

    .slick-slide img {
      display: block;
    }

    .slick-slide.slick-loading img {
      display: none;
    }

    .slick-slide.dragging img {
      pointer-events: none;
    }

    .slick-initialized .slick-slide {
      display: block;
    }

    .slick-loading .slick-slide {
      visibility: hidden;
    }

    .slick-vertical .slick-slide {
      display: block;
      height: auto;
      border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
      display: none;
    }

    .category-heading {
      display: flex;
      align-items: center;
    }

    .line {
      flex-grow: 1;
      height: 1px;
      background-color: black;
      margin: 0 10px;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid bg-white shadow-sm">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-2 mb-4">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img src="../images/icon.png" class="icon1 me-2" width="90">
        </a>
        <ul class="nav">
          <li class="nav-item"><a href="/" class="nav-link text-success border-bottom border-2 border-success text-success">Home</a></li>
          <li class="nav-item"><a href="program2.php" class="nav-link text-dark">Program</a></li>
          <li class="nav-item"><a href="gallery2.php" class="nav-link text-dark">Gallery</a></li>
          <li class="nav-item"><a href="./product2.php" class="nav-link text-dark">Product</a></li>
          <li class="nav-item"><a href="./contact2.php" class="nav-link text-dark">Contact</a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-dark" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person" width="24" height="24"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="./logout.php">Log out</a></li>
            </ul>
          </li>
        </ul>
      </header>
    </div>
  </div>
  <!-- navbar closed -->
  <!-- Promo Card -->
  <div class="container content">
    <div class="row my-5">
      <div class="col-lg-7 col-md col-sm-12 col-12">
        <div class="card position-relative shadow rounded-5 border-0">
          <iframe class="rounded-5 shadow" width="auto" height="400px" src="https://www.youtube.com/embed/ZF0BE5lDLlU?si=J6LOzsOwEvGQ0kTp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-lg col-md col-sm-12 col-12">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="text-start d-flex me-auto">Promo Area</h2>
          <a href="#" class="text-end d-flex align-items-center text-success text-decoration-none">View All</a>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
          <div class="col-lg-4 col-md col-sm-4 col-4">
            <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg border-0" style="background-image: url(../images/card1.jpg); position: relative;">
              <img src="../images/card1.jpg" alt="" width="100%" style="border-radius: 15px;">
              <div class="d-flex flex-column h-100 p-4 pb-3 text-white text-shadow-1" style="position: absolute; bottom: 0; left: 20px; right: 0; top: auto;">
              </div>
            </div>
            <div class="d-flex flex-column h-100 p-4 pb-3 text-dark text-shadow-1 mt-3">
              <span class="border-start"><span class="px-3">Dino-Shake</span></span>
            </div>
          </div>
          <div class="col-lg-4 col-md col-sm-4 col-4">
            <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow border-0" style="background-image: url(../images/card1.jpg); position: relative;">
              <img src="../images/card2.jpg" alt="" width="100%" style="border-radius: 15px;">
              <div class="d-flex flex-column h-100 p-4 pb-3 text-white text-shadow-1" style="position: absolute; bottom: 0; left: 20px; right: 0; top: auto;">
              </div>
            </div>
            <div class="d-flex flex-column h-100 p-4 pb-3 text-dark text-shadow-1 mt-3">
              <span class="border-start"> <span class="px-3">Mass Gainer.</span></span>
            </div>
          </div>
          <div class="col-lg-4 col-md col-sm-4 col-4">
            <div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow border-0" style="background-image: url(../images/card1.jpg); position: relative;">
              <img src="../images/card3.jpg" alt="" width="100%" style="border-radius: 15px;">
              <div class="d-flex flex-column h-100 p-4 pb-3 text-white text-shadow-1" style="position: absolute; bottom: 0; left: 20px; right: 0; top: auto;">
              </div>
            </div>
            <div class="d-flex flex-column h-100 p-4 pb-3 text-dark text-shadow-1 mt-3">
              <span class="border-start"><span class="px-3">Fat Reducer</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Promo Card Closed -->
  <!-- product card -->
  <div class="container">
    <div class="d-flex mb-4 justify-content-between align-items-center ">
      <h2 class="text-start d-flex me-auto">Smoothie of the <span class="text-success">&nbsp;day</span></h2>
      <a href="#" class="text-end d-flex align-items-center text-success text-decoration-none">View All</a>
    </div>
    <div class="container">
      <section class="customer-logos slider">
        <div class="slide">
          <div class="p-2 col-lg col-md col-sm col">
            <div class="card border-0 h-100 shadow" style="border-radius: 20px 20px 20px 20px;">
              <img src="../images/shake1.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="..." width="100%" height="210">
              <div class="card-body">
                <h5 class="card-title">Energy Booster Shake</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="slide">
          <div class="p-2 col-lg col-md col-sm col">
            <div class="card border-0 h-100 shadow" style="border-radius: 20px 20px 20px 20px;">
              <img src="../images/shake2.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="..." width="100%" height="210">
              <div class="card-body">
                <h5 class="card-title">Pro-vitamin Shake</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="slide">
          <div class="p-2 col-lg col-md col-sm col">
            <div class="card border-0 h-100 shadow" style="border-radius: 20px 20px 20px 20px;">
              <img src="../images/shake3.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="..." width="100%" height="210">
              <div class="card-body">
                <h5 class="card-title">Fat reducer Shake</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="slide">
          <div class="p-2 col-lg col-md col-sm col">
            <div class="card border-0 h-100 shadow" style="border-radius: 20px 20px 20px 20px;">
              <img src="../images/shake3.jpg" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="..." width="100%" height="210">
              <div class="card-body">
                <h5 class="card-title">Fat reducer Shake</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- <input type="hidden" class="slide"></input> -->
      </section>
    </div>
  </div>
  <!--product card Closed -->
  <!-- Category  -->
  <div class="container my-5">
    <div class="row">
      <div class="col-lg col-md col-sm col">
        <div class="category-heading">
          <hr class="line">
          <h3>OUR SUPPLEMENT CATEGORIES</h3>
          <hr class="line">
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category1.svg" alt="" width="100">
        <div class="py-3">Beauty Health</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category2.svg" alt="" width="100">
        <div class="py-3">Women Health</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category3.svg" alt="" width="100">
        <div class="py-3">Diabetic Support</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category4.svg" alt="" width="100">
        <div class="py-3">Kids Health</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category5.svg" alt="" width="100">
        <div class="py-3">Weight Management</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category6.svg" alt="" width="100">
        <div class="py-3">Immune Health</div>
      </div>
      <div class="col-lg col-md col-sm col text-center">
        <img src="../images/category7.svg" alt="" width="100">
        <div class="py-3">Vitamins & Minerals</div>
      </div>
    </div>
  </div>
  <!-- Category Closed  -->
  <!-- Our Specialities -->
  <div class="b-example-divider"></div>
  <div class="container px-4">
    <h2 class="pb-2 border-bottom">Our <span class="text-success"> &nbsp; Specialities</span></h2>
    <div class="row row-cols-1 row-cols-md-2 g-5 py-5 align-items-md-center">
      <div class="col-lg-5 col-md col-sm col d-flex flex-column align-items-start gap-2">
        <h2 class="fw-bold text-body-emphasis">Nutri-time</h2>
        <p class="text-body-secondary">The NutriDiet Planner & Health Shake Provider website embodies a comprehensive approach to holistic well-being by seamlessly integrating cutting-edge nutritional planning and premium health shake offerings. This platform leverages state-of-the-art technology and nutritional expertise to empower users in achieving their fitness and health goals. Key features include personalized diet planning tools, a diverse range of health shakes, and a user-friendly interface for a seamless experience.</p>
        <a href="#" class="btn text-success btn-lg" style="border-color: green;">Get started</a>
      </div>
      <div class="col-lg col-md col-sm col">
        <div class="row row-cols-1 row-cols-sm-2 g-4">
          <div class="col d-flex align-items-start">
            <div class="px-3 icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 rounded-3 btn" style="background-color: rgb(44, 202, 44);">
              <i class="bi bi-bar-chart-steps text-white"></i>
            </div>
            <div>
              <h3 class="fs-2 text-body-emphasis">Personalized weight Management & Nutritional Planning:</h3>
              <p class="text-body-secondary">Customizable meal options cater to various dietary needs, including weight loss, muscle gain, and overall wellness.</p>
            </div>
          </div>
          <div class="col d-flex align-items-start">
            <div class="px-3 icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 rounded-3 btn" style="background-color: rgb(44, 202, 44);">
              <i class="bi bi-cup-straw text-white"></i>
            </div>
            <div>
              <h3 class="fs-2 text-body-emphasis">Health Shake Marketplace:</h3>
              <p class="text-body-secondary">A curated collection of premium health shakes crafted with high-quality ingredients, designed to complement diverse nutritional needs.</p>
            </div>
          </div>
          <div class="col d-flex align-items-start">
            <div class="px-3 icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 rounded-3 btn" style="background-color: rgb(44, 202, 44);">
              <i class="bi bi-graph-up-arrow text-white"></i>
            </div>
            <div>
              <h3 class="fs-2 text-body-emphasis">Progress Tracking and Analytics:</h3>
              <p class="text-body-secondary">Real-time analytics provide insights into the impact of dietary choices on health and fitness outcomes.</p>
            </div>
          </div>
          <div class="col d-flex align-items-start">
            <div class="px-3 icon-square text-body-emphasis d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3 rounded-3 btn" style="background-color: rgb(44, 202, 44);">
              <i class="bi bi-easel2 text-white"></i>
            </div>
            <div>
              <h3 class="fs-2 text-body-emphasis">Nutritional Education Hub:</h3>
              <p class="text-body-secondary">A rich resource of articles, blogs, and expert advice on nutrition, fitness, and overall well-being.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>
  <!-- Our Specialities Closed -->
  <!-- Get started -->
  <div class="container col-xxl-8 col-md col-sm col px-4 pt-2">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class=" col-lg-6 col-md-6 col-sm-8 col-10 text-center">
        <img src="../images/bg2.png" class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6  col-md-6 col-sm col">
        <h2 class="border-4 border-warning border-start mb-4">&nbsp;&nbsp;Get started</h2>
        <p class="lead">The <span class="fw-bold">NutriDiet Planner & Health Shake </span>Provider website is a comprehensive online platform dedicated to revolutionizing personal wellness through advanced nutritional planning and premium health shake offerings. The platform is designed to empower users in achieving their health and fitness goals by providing a seamless and personalized experience. Here's an overview of the key features and functionalities:</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 col-md col-sm-12 col-12">
        <div class="card position-relative" style="border-radius: 15px; border: none;">
          <iframe class="rounded-5 shadow-lg" width="auto" height="400px" src="https://www.youtube.com/embed/ad7I_K3lgww?si=Dh_PWPiM7G3gZagM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-lg col-md col-sm col">
        <h2>NutriDiet Planner Tutorial:</h2>
        <ul>
          <li>Provide a brief overview of the NutriDiet Planner feature, emphasizing its role in creating tailoreddiet plans for users.</li>
          <li>Highlight the benefits of using the NutriDiet Planner in achieving specific health and fitness goals.</li>
          <li>nstruct users on how to set up their account, ensuring they enter accurate personal information, such asage, gender, weight, height, and activity level.</li>
          <li>Guide users through the process of specifying their dietary preferences, including preferred cuisines, food restrictions (e.g., allergies, vegetarianism), and any specific nutrition goals.</li>
          <li>Assist users in setting realistic fitness goals, such as weight loss, muscle gain, or maintenance.</li>
        </ul>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-lg col-md col-sm col text-center">
        <p>The <span class="fw-bold">NutriDiet Planner & Health Shake</span> Provider website serves as an invaluable tool for customers seeking a holistic approach to their well-being. By seamlessly integrating advanced nutritional planning tools and a diverse range of premium health shakes, the platform empowers users to tailor their diet and fitness journey according to their unique needs and goals. Offering personalized diet plans based on individual profiles, intelligent recipe suggestions, and a marketplace for high-quality health shakes, the website provides a one-stop solution for achieving and maintaining optimal health. The inclusion of progress tracking, a supportive community, and educational resources further enhances the overall user experience, making this website an indispensable companion on the path to a healthier and more balanced lifestyle.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg col-md col-sm col">
        <div class="h2">Location</div>
        <iframe class="rounded-4 shadow-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.3535269964405!2d75.80167171008931!3d11.235383050515505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba6598b2df058a5%3A0x97cd84408536abd3!2sNUTRI%20TIME%20WELLNESS%20HUB!5e0!3m2!1sen!2sin!4v1707389128637!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  <!-- Get started closed -->
  <!-- footer -->
  <div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 py-5 my-5 border-top">
      <div class="col-lg col-md col-sm col mb-3 d-flex">
        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none"><img src="../images/icon.png" alt="" width="150"></a>
        <!-- <p class="text-body-secondary">&copy; 2024</p> -->
      </div>
      <div class="col-lg col-md col-sm col mb-3">
      </div>
      <div class="col-lg col-md col-sm col-6 mb-3">
        <h3>Pages</h3>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./index2.php" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="./program2.php" class="nav-link p-0 text-body-secondary">Program</a></li>
          <li class="nav-item mb-2"><a href="./gallery2.php" class="nav-link p-0 text-body-secondary">Gallery</a></li>
          <li class="nav-item mb-2"><a href="./product2.php" class="nav-link p-0 text-body-secondary">Product</a></li>
          <li class="nav-item mb-2"><a href="./login.php" class="nav-link p-0 text-body-secondary">Log out</a></li>
        </ul>
      </div>
      <div class="col-lg col-md col-sm col-6 mb-3">
        <h3>Address</h3>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary">Ashraf K P</a></li>
          <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary">1st Floor, NUTRI TIME</a></li>
          <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary">WELLNESS HUB, NTA Complex</a></li>
          <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary">Bypass Junction, Mankave</a></li>
          <li class="nav-item mb-2"><a class="nav-link p-0 text-body-secondary">Kozhikode, Kerala, 673007</a></li>
        </ul>
      </div>
    </footer>
    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>Powered by <a href="https://allenzion.com/">Allen<span class="text-danger">Zion</span></a></p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" target="_blank" href="https://www.instagram.com/nutritimenutritionclub/"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
      </ul>
    </div>
  </div>
  <!-- Footer closed -->
  <script>
    $(document).ready(function() {
      $('.customer-logos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 1
          }
        }]
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>