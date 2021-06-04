<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoSitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Dominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoTicket::setConexionBD($conexion);
ManejoDominio::setConexionBD($conexion);
ManejoSitioWeb::setConexionBD($conexion);


$cod_cliente  =  $_SESSION['cod_cliente'];

$cliente = ManejoCliente::consultarCliente($cod_cliente);
$sitio_web = ManejoSitioWeb::consultarSitioWebPorCliente($cod_cliente);

//$List_ticket = ManejoTicket::getListTickxCliente($cliente->getCod_cliente());
//$ticket = ManejoTicket::consultarTicketxCliente($cliente->getCod_cliente());

?>

<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">BIENVENIDO A SUS<span> TICKETS: <?php echo $cliente->getNom_cliente() ?>

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
        <h2>Mis tickets</h2>

    </div>
</section><!-- End Breadcrumbs -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>TICKETS</h2>

        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Locación:</h4>
                        <p>Colombia</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>chibchaweb_ueb@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Teléfono:</h4>
                        <p>+57 304 436 6165</p>
                    </div>

                </div>

            </div>


            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
                <form action="ModuloUsuario/creaTicket.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post">
                    <div class="row">
                        <div class="form-group mt-3">
                            <select name="nombreTicket" id="nombreTicket" class="form-control">
                                <option class="form-control">Ingrese una opción</option>
                                <option class="form-control">Cambio de plan de pago</option>
                                <option class="form-control">Cambio de paquete</option>
                                <option class="form-control">Cambio de distribuidor</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="descripcion" rows="5" placeholder="Descripción del ticket" required></textarea>
                    </div>
                    <div class="text-center">
                        <br>
                        <?php

                        if ($sitio_web->getCod_sitio_web() != null) {
                            # code...

                            $dominios = ManejoDominio::consultarDominioPorSitioWEb($sitio_web->getCod_sitio_web());

                            if (($cliente->getCod_cliente() == $sitio_web->getCod_cliente() && $dominios->getCod_sitio_web() == $sitio_web->getCod_sitio_web()) != null) {

                                echo '<button class="btn btn-outline-success" type="submit">Subir ticket</button>';
                            }
                        } else {
                            echo '<div class="section-title">
                            <h4>DEBE COMPRAR PREVIAMENTE UN PAQUETE</h4>
                        </div>';
                        }

                        ?>

                    </div>

                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>HISTORIAL DE TICKETS</h2>
        </div>
        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">
            <?php
            $i = 0;
            $List_ticket = ManejoTicket::getListTickxCliente($cliente->getCod_cliente());
            if ($List_ticket != null) {
                foreach ($List_ticket as $lista) {

                    $i++;
                    echo '<div class="col-lg-5">
            <div class="info">
                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Número de ticket:</h4>
                    <p>' . $i . '</p>
                </div>

                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Nombre del ticket:</h4>
                    <p>' . $lista->getNom_ticket() . '</p>
                </div>

                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Descripción del ticket:</h4>
                    <p>' . $lista->getDescripción_ticket() . '</p>
                </div>

                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Estado del ticket:</h4>
                    <p>' . $lista->getEstado_del_ticket() . '</p>
                </div>
                <br>
                <hr>
            </div>

        </div>';
                }
            } else {
                echo 'NO TIENE HISTORIAL DE TICKETS';
            }
            ?>
        </div>

    </div>
</section><!-- End Contact Section -->