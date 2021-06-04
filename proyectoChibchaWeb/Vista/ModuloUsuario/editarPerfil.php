<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
$cod_cliente  =  $_GET['cod_cliente'];
$cliente = ManejoCliente::consultarCliente($cod_cliente);
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

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry">

                    <h2 class="entry-title">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn2ier7zl7ZxdJjhS7O-QkJd1CLNA0G611JyKV6dmy8ODXE1ODJIhzsYbDV7U6Ao3V8bk&usqp=CAU" alt="" class="img-fluid">
                        <a>Editar tu perfil </a>

                    </h2>

                    <div class="entry-content">
                        <div class="col-lg-12">
                            <form action="ModuloUsuario/editaPerfil.php?cod_cliente=<?php echo $cliente->getCod_cliente() ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="entry-meta">Nombre y Apellidos:</p>
                                    </div>
                                    <br>
                                    <div class="col-lg-3">
                                        <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombres y apellidos" value="<?php echo $cliente->getNom_cliente() ?>">
                                        <p><br></p>
                                    </div>

                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Número de indentificación:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="nroIdentificacion" class="form-control" id="nroIdentificacion" value="<?php echo $cliente->getCedula_cliente() ?>" readonly>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Telefono:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfonos" value="<?php echo $cliente->getTelefono_cliente() ?>">
                                        <p><br></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p p class="entry-meta">Correo eléctronico:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo electrónico" value="<?php echo $cliente->getCorreo_cliente() ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="entry-meta">Contraseña:</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="contraseña" class="form-control" id="name" placeholder="Contraseña" value="<?php echo $cliente->getContraseña_cliente() ?>">
                                    </div>
                                </div>
                                <div class="read-more">
                                    <button class="btn btn-outline-success" type="submit">Modificar</button>
                                </div>
                            </form>
                        </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->
        </div>

       

    </div>
</section><!-- End Blog Section -->