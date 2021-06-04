<?php

session_start();
if($_SESSION['cod_cliente']==null)
{
    header("Location: ../index.php");
}
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
$_SESSION['pack']=$_GET['pack'];

//ManejoDistribuidor::setConexionBD($conexion);
//$lista = ManejoDistribuidor::consultarTicketCodigoEmpleado(1);
//$lista = ManejoDistribuidor::getList();
//$prueba1 = ManejoDistribuidor::consultarTicket(2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Chibcha Web Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Anyar/assets/img/logochibchaweb.png" rel="icon">
  <link href="../Anyar/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Anyar/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../Anyar/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Anyar/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ../Anyar - v4.1.0
  * Template URL: https://bootstrapmade.com/../anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">chibchaweb_ueb@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +57 304 436 6165
      </div>
      <div class="cta d-none d-md-block">
      <a href="../logout.php" class="scrollto">Cerrar Sesión</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="../Anyar/assets/img/CHIBCHAWEB.png" alt="ChibchaWeb2" width="90" height="60">
      <h1 class="logo"><a href="index.php">ChibchaWeb</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
    </div>
  </header><!-- End Header -->



  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="../User.php">Home</a></li>
        </ol>
        <h2>Dominios</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Icon Boxes Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dominios </h2>
          <p>Consulte su dominio.</p>
        </div>

        <div class="row">
        <form action="distribuidores.php" method="post" role="form" >
            
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="dom" id="subject" placeholder="Buscar dominio aquí" required>
              </div>
                <br>
              <div class="text-center" ><input type="submit" class="btn btn-outline-success"></div>
            </form>
        </div>
         

      </div>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

   
    <div class="footer-top">
      <div class="container">
        <div class="row">


          <div class="col-lg-5 col-md-6 footer-contact">
            <h4>Contactanos</h4>
            <p>
              Sugamuxi <br>
              Colombia <br><br>
              <strong>Teléfono:</strong> +57 304 436 6165<br>
              <strong>Email:</strong> chibchaweb_ueb@gmail.ecom<br>
            </p>

          </div>

          <div class="col-lg-5 col-md-6 footer-info">
            <h3>ChibchaWeb</h3>
            <p>Te invitamos a seguirnos en nuestras redes sociales.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>InnoSoft</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/../anyar-free-multipurpose-one-page-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../Anyar/assets/vendor/aos/aos.js"></script>
  <script src="../Anyar/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Anyar/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Anyar/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../Anyar/assets/vendor/php-email-form/validate.js"></script>
  <script src="../Anyar/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../Anyar/assets/js/main.js"></script>

  <script>
        function myFunction() {
          // Declare variables
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById('myInput');
          filter = input.value.toUpperCase();
          ul = document.getElementById("myUL");
          li = ul.getElementsByTagName('article');
        
          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
        }
        function showDistributors() {
            document.getElementById("blog").style.display = "block"
        }
</script>

</body>

</html>