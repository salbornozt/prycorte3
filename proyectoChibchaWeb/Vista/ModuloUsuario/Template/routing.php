<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'index') {
        include_once("../Vista/ModuloUsuario/index.php");
    }
    if ($_GET['menu'] == 'perfil') {
        include_once("../Vista/ModuloUsuario/perfil.php");
    }
    if ($_GET['menu'] == 'tickets') {
        include_once("../Vista/ModuloUsuario/tickets.php");
    }
    if ($_GET['menu'] == 'editarPerfil') {
        include_once("../Vista/ModuloUsuario/editarPerfil.php");
    }
    if ($_GET['menu'] == 'editarSitioWeb') {
        include_once("../Vista/ModuloUsuario/editarSitioWeb.php");
    }
    if ($_GET['menu'] == 'editarTarjetaCredito') {
        include_once("../Vista/ModuloUsuario/editarTarjetaCredito.php");
    }

    if ($_GET['menu'] == 'crearSitioWeb') {
        include_once("../Vista/ModuloUsuario/crearSitioWeb.php");
    }
    if ($_GET['menu'] == 'crearTarjetaCredito') {
        include_once("../Vista/ModuloUsuario/crearTarjetaCredito.php");
    }
} else if (isset($_GET['paquetes'])) {
    if ($_GET['paquetes'] == 'distribuidor') {
        include_once("../Vista/ModuloUsuario/distribuidores.php");
    }
} else {
    include_once("../Vista/ModuloUsuario/index.php");
}
