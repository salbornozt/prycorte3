<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoSitioWeb.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoSitioWeb::setConexionBD($conexion);
$cod_cliente  =  $_GET['cod_cliente'];
$cliente = ManejoCliente::consultarCliente($cod_cliente);
$cliente_sitioWeb = ManejoSitioWeb::consultarSitioWebPorCliente($cod_cliente);
?>


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIENVENIDO A <span>SU PERFIL USUARIO: <?php echo $cliente->getNom_cliente() ?>

                        <!--AQUI VA CONEXION BD LLAMAR AL NOMBRE CLIENTE-->
                    </span></h2>

            </div>
        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="?menu=index"><i class="fa fa-angle-double-left" aria-hidden="true">Volver al inicio</i></a></li>
        </ol>
        <h2>Mi perfil</h2>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <!--AQUI VA DATOS DEL SITIO WEB CLIENTE-->
        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry">

                    <h2 class="entry-title">
                        <img src="Anyar/assets/img/logo_sitio_web.png" alt="" class="img-fluid" width="150" height="150">
                        <a>Mis Datos Sitio Web </a>

                    </h2>

                    <div class="entry-content">
                        <form action="ModuloUsuario/editaSitioWeb.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post">
                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <p class="entry-meta">Nombre Página Web:</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="nombrePaginaWeb" class="form-control" id="nombrePaginaWeb" placeholder="" value="<?php echo $cliente_sitioWeb->getNombre_pagina_web() ?>" required>
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p p class="entry-meta">Descripción Página Web:</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" name="descripcion" rows="5" required><?php echo $cliente_sitioWeb->getDescripcion() ?></textarea>
                                        <p><br></p>
                                    </div>
                                    <div class="read-more">
                                        <div class="read-more">
                                            <button class="btn btn-outline-success" type="submit">Guardar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->
        </div>



    </div>
</section><!-- End Blog Section -->