<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/TarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Tipo_tarjeta.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTipo_tarjeta.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoTarjetaCredito::setConexionBD($conexion);
ManejoTipo_tarjeta::setConexionBD($conexion);
$cod_cliente  =  $_GET['cod_cliente'];
$cliente = ManejoCliente::consultarCliente($cod_cliente);
$cliente_tarjeta = ManejoTarjetaCredito::consultarTarjetaCreditoPorCliente($cod_cliente);
//$tipo_tarjeta = ManejoTipo_tarjeta::consultarTipo_tarjeta($cliente_tarjeta->getCod_tipo_tarjeta());
$list_tarjeta = ManejoTipo_tarjeta::getList();
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

        <!--AQUI VA DATOS DE TARJETA DE CREDITO CLIENTE-->
        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry">

                    <h2 class="entry-title">
                        <img src="Anyar/assets/img/logo_tarjetas.png" alt="" class="img-fluid" width="290" height="200">
                        <a>Mis Datos Tarjetas Creditos </a>

                    </h2>

                    <div class="entry-content">
                        <form action="ModuloUsuario/creaTarjetaCredito.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="entry-meta">Número tarjeta:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="numeroTarjeta" class="form-control" id="numeroTarjeta" placeholder="Ingrese el número" pattern="[0-9]{12}" required>
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Código de seguridad:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="cod_seguridad" class="form-control" id="cod_seguridad" placeholder="Ingrese el código de seguridad" pattern="[0-9]{3}" required>
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Dirección:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese la dirección" required>
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Marca:</p>
                                    </div>
                                    <div class="col-lg-3">

                                        <select name="marca" id="marca" class="form-control">

                                            <option>Selecciona la marca</option>
                                            <?php

                                            foreach ($list_tarjeta as $t) {

                                                echo '<option value=' . $t->getCod_tipo_tarjeta() . '>' . $t->getNombre_casa() . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Fecha expiración:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" name="fechaExpiracion" class="form-control" id="fechaExpiracion" placeholder="Ingrese la fecha de expiración" required>
                                        <p><br></p>
                                    </div>
                                </div>
                            </div>
                            <div class="read-more">
                                <div class="read-more">
                                    <button class="btn btn-outline-success" type="submit">Crear</button>
                                </div>
                            </div>
                        </form>
                </article><!-- End blog entry -->
            </div><!-- End blog entries list -->
        </div>

    </div>
</section><!-- End Blog Section -->