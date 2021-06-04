<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'bienvenidos') {
        include_once("../Vista/ModuloEmpleado/bienvenido.php");
    }
    if ($_GET['menu'] == 'verTickets') {
        include_once("../Vista/ModuloEmpleado/verTickets.php");
    }
    if ($_GET['menu'] == 'gestionTickets') {
        include_once("../Vista/ModuloEmpleado/gestionTickets.php");
    }
    if ($_GET['menu'] == 'verUsuarios') {
        include_once("../Vista/ModuloEmpleado/verUsuarios.php");
    }
    if ($_GET['menu'] == 'salir') {
        include_once("../Vista/index.php");
    }
    if ($_GET['menu'] == 'perfil') {
        include_once("../Vista/ModuloEmpleado/perfil.php");
    }
} else {
    include_once("../Vista/ModuloEmpleado/index.php");
}
?>