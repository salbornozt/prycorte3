<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoSitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/TarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Tipo_tarjeta.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTipo_tarjeta.php';

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Dominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDominio.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoSitioWeb::setConexionBD($conexion);
ManejoTarjetaCredito::setConexionBD($conexion);
ManejoTipo_tarjeta::setConexionBD($conexion);
ManejoDominio::setConexionBD($conexion);

$cod_cliente  =  $_SESSION['cod_cliente'];
//echo $cod_cliente;
$cliente = ManejoCliente::consultarCliente($cod_cliente);
$cliente_sitioWeb = ManejoSitioWeb::consultarSitioWebPorCliente($cod_cliente);
$cliente_tarjeta = ManejoTarjetaCredito::consultarTarjetaCreditoPorCliente($cod_cliente);
$paquete = ManejoDominio::usuarioDominio($cod_cliente);
//$tipo_tarjeta = ManejoTipo_tarjeta::consultarTipo_tarjeta($cliente_tarjeta->getCod_tipo_tarjeta());
//echo $paquete->getUrl();


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
            <img src="Anyar/assets/img/logo_cliente.png" alt="" class="img-fluid">
            <a>Mis Datos Personales </a>

          </h2>

          <div class="entry-content">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3">
                  <p class="entry-meta">Nombre y Apellidos:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombres y apellidos" value="<?php echo $cliente->getNom_cliente() ?>" readonly>
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
                  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfonos" value="<?php echo $cliente->getTelefono_cliente() ?>" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Correo eléctronico:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo electrónico" value="<?php echo $cliente->getCorreo_cliente() ?>" readonly>
                </div>
                <div class="col-lg-3">
                  <p class="entry-meta">Contraseña:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="contraseña" class="form-control" id="name" placeholder="Contraseña" value="<?php echo $cliente->getContraseña_cliente() ?>" readonly>
                </div>
              </div>
            </div>
            <div class="read-more">
              <!--<div class="sidebar">
                <input class="read-more" type="button" value="Modificar" type="submit"></
              </div>-->
              <div class="read-more">
                <a href="?menu=editarPerfil&cod_cliente=<?php echo $cliente->getCod_cliente() ?>">Editar perfil</a>
              </div>
            </div>
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->
    </div>






    <!--AQUI VA DATOS DEL SITIO WEB CLIENTE-->
    <div class="row">

      <div class="col-lg-12 entries">

        <article class="entry">

          <h2 class="entry-title">
            <img src="Anyar/assets/img/logo_sitio_web.png" alt="" class="img-fluid" width="150" height="150">
            <a>Mis Datos Sitio Web </a>

          </h2>
          <?php if ($cliente_sitioWeb->getCod_sitio_web() != null && $cliente_sitioWeb->getCod_cliente() != null) {
            //$cliente_sitioWeb = ManejoSitioWeb::consultarSitioWebPorCliente($cod_cliente);
            echo '
          <div class="entry-content">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <p class="entry-meta">Nombre Página Web:</p>
                </div>
                <div class="col-lg-6">
                  <input type="text" name="nombrePaginaWeb" class="form-control" id="nombrePaginaWeb" placeholder="" value="' . $cliente_sitioWeb->getNombre_pagina_web() . '" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-6">
                  <p p class="entry-meta">Descripción Página Web:</p>
                </div>
                <div class="col-lg-6">
                  <textarea class="form-control" name="descripcion" rows="5" readonly>' . $cliente_sitioWeb->getDescripcion() . '</textarea>
                  <p><br></p>
                </div>

              </div>
            </div>
            <div class="read-more">
              <div class="read-more">
                <a href="?menu=editarSitioWeb&cod_cliente=' . $cliente->getCod_cliente() . '">Editar</a>
              </div>
            </div>';
          } else {
            echo '<div class="entry-content">

            <div class="read-more">
          <div class="read-more">
            <a href="?menu=crearSitioWeb&cod_cliente=' . $cliente->getCod_cliente() . '">Agregar sitio web</a>
          </div>
          </div>
        </div>';
          } ?>
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->
    </div>

    <!--AQUI VA DATOS DE TARJETA DE CREDITO CLIENTE-->

    <div class="row">

      <div class="col-lg-12 entries">

        <article class="entry">

          <h2 class="entry-title">
            <img src="Anyar/assets/img/logo_tarjetas.png" alt="" class="img-fluid" width="290" height="200">
            <a>Mis Datos Tarjetas Creditos </a>

          </h2>
          <?php if ($cliente_tarjeta->getCod_tarjeta_credito() != null && $cliente_tarjeta->getCod_tipo_tarjeta() != null && $cliente_tarjeta->getCod_cliente() != null) {

            $tipo_tarjeta = ManejoTipo_tarjeta::consultarTipo_tarjeta($cliente_tarjeta->getCod_tipo_tarjeta());
            echo '<div class="entry-content">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-3">
                <p class="entry-meta">Número tarjeta:</p>
              </div>
              <div class="col-lg-3">
                <input type="text" name="numeroTarjeta" class="form-control" id="numeroTarjeta" placeholder="" value="' . $cliente_tarjeta->getNumero_tarjeta() . '" readonly>
                <p><br></p>
              </div>
              <div class="col-lg-3">
                <p p class="entry-meta">Código de seguridad:</p>
              </div>
              <div class="col-lg-3">
                <input type="text" name="cod_seguridad" class="form-control" id="cod_seguridad" placeholder="" value="' . $cliente_tarjeta->getCodigo_seguridad() . '" readonly>
                <p><br></p>
              </div>
              <div class="col-lg-3">
                <p p class="entry-meta">Dirección:</p>
              </div>
              <div class="col-lg-3">
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="" value="' . $cliente_tarjeta->getDireccion() . '" readonly>
                <p><br></p>
              </div>
              <div class="col-lg-3">
                <p p class="entry-meta">Marca:</p>
              </div>
              <div class="col-lg-3">
                <input type="text" name="marca" class="form-control" id="marca" placeholder="" value="' . $tipo_tarjeta->getNombre_casa() . '" readonly>
                <p><br></p>
              </div>
              <div class="col-lg-3">
                <p p class="entry-meta">Fecha expiración:</p>
              </div>
              <div class="col-lg-3">
                <input type="text" name="fechaExpiracion" class="form-control" id="fechaExpiracion" placeholder="" value="' . $cliente_tarjeta->getFecha_expiracion() . '" readonly>
                <p><br></p>
              </div>
            </div>
          </div>
          <div class="read-more">
            <div class="read-more">
              <a href="?menu=editarTarjetaCredito&cod_cliente=' . $cliente->getCod_cliente() . '">Modificar datos</a>
            </div>
          </div>';
          } else {
            echo ' <div class="entry-content">
            <div class="read-more">
              <div class="read-more">
                <a href="?menu=crearTarjetaCredito&cod_cliente=' . $cliente->getCod_cliente() . '">Agregar datos</a>
              </div>
            </div>
          </div>';
          } ?>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->
    </div>

    <div class="row">

      <div class="col-lg-12 entries">

        <article class="entry">

          <h2 class="entry-title">

            <img style="margin: 25px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTExMS4yNjQsNzAuOTQybC05Mi4zNjcsNDkuMDIzYy0xLjU4MiwwLjgyOS0zLjA3NiwxLjc3My00LjQ4OCwyLjgwNmwyMzYuMTkxLDEyMy4xNjNsOTguOTA1LTQ4LjkyTDExMS4yNjQsNzAuOTQyeiIgZmlsbD0iIzMzOWYxYSIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNTExLjk1NCwxNTAuMTIybC0xMTguMTYzLDU4LjQ0NHY2NS44NDNjMCw4LjI4MS02LjcxNCwxNC45OTUtMTQuOTk1LDE0Ljk5NWMtOC4yODEsMC0xNC45OTUtNi43MTQtMTQuOTk1LTE0Ljk5NVYyMjMuNCAgICBsLTk4LjM4Niw0OC42NjN2MjM4LjI5NWMwLjMwOC0wLjE0MywwLjYyLTAuMjc1LDAuOTI1LTAuNDI3bDIyNi4xODItMTE0LjYwNUM1MDQuNTM4LDM4OS4zMTgsNTEyLDM3Ny4yNDYsNTEyLDM2My44MDd2LTIxMi4zNiAgICBDNTEyLDE1MS4wMDIsNTExLjk3LDE1MC41NjMsNTExLjk1NCwxNTAuMTIyeiIgZmlsbD0iIzMzOWYxYSIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNDkyLjUyMiwxMTkuOTI3TDI2Ni40MzMsNS4zN2wtMC4wOTQtMC4wNDdjLTEwLjA2Ny01LjAxMi0yMi4wMjktNC45LTMyLjAwMiwwLjNsLTkxLjA2Miw0OC4zMjlsMjM5LjM3LDEyNi42NjkgICAgbDExNS41NC01Ny4xNDdDNDk2LjQzMSwxMjIuMTM4LDQ5NC41NDgsMTIwLjkzOSw0OTIuNTIyLDExOS45Mjd6IiBmaWxsPSIjMzM5ZjFhIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0wLjA3MSwxNDkuMTE3QzAuMDMxLDE0OS44MDQsMCwxNTAuNDkyLDAsMTUxLjE4NnYyMTIuODgxYzAsMTMuMTYyLDcuMjQsMjUuMTE4LDE4Ljg5NiwzMS4yMjFsMjE1LjM0NSwxMTQuMjkyICAgIGwwLjA5NywwLjA1MWMwLjM1OCwwLjE4NywwLjcyNCwwLjM1MiwxLjA4NywwLjUyNVYyNzEuODQzTDAuMDcxLDE0OS4xMTd6IiBmaWxsPSIjMzM5ZjFhIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" alt="" class="img-fluid" width="150" height="150">
            <a>Paquete Activo</a>

          </h2>
          <?php
          if ($paquete->getCod_dominio() != null) {

          ?>


            <div class="entry-content">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-3">
                    <p class="entry-meta">Nombre de paqute:</p>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombre de paqute" value="<?php echo $paquete->getNom_paquete() ?>" readonly>
                    <p><br></p>
                  </div>
                  <div class="col-lg-3">
                    <p p class="entry-meta">Dominio:</p>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" name="nroIdentificacion" class="form-control" id="nroIdentificacion" placeholder="Dominio" value="<?php echo $paquete->getUrl() ?>" readonly>
                  </div>
                  <div class="col-lg-3">
                    <p p class="entry-meta">Nombre de distribuidor:</p>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Nombre de distribuidor" value="<?php echo $paquete->getNom_distribuidor() ?>" readonly>
                    <p><br></p>
                  </div>
                  <div class="col-lg-3">
                    <p p class="entry-meta">Plan de pago:</p>
                  </div>
                  <div class="col-lg-3">
                    <input type="text" name="correo" class="form-control" id="correo" placeholder="Plan de pago" value="<?php echo $paquete->getNom_planPago() ?>" readonly>
                  </div>

                </div>
              </div>
              <div class="read-more">
                <!--<div class="sidebar">
                <input class="read-more" type="button" value="Modificar" type="submit"></
              </div>-->
                <div class="read-more">
                  <a href="?menu=tickets">Pedir cambio de Paqute</a>
                </div>
              </div>
            <?php
          } else {
            echo '<div class="entry-content">
            <div class="read-more">
              <div class="read-more">
                <a href="?menu=index#pricing">Mirar paquetes</a>
              </div>
            </div>
          </div>';
          }
            ?>
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->
    </div>

  </div>
</section><!-- End Blog Section -->