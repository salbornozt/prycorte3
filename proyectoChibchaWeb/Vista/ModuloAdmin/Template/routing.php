<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'bienvenido') {
        include_once("../Vista/ModuloAdmin/bienvenido.php");
    }
    if ($_GET['menu'] == 'charts') {
        include_once("../Vista/ModuloAdmin/charts.php");
    }
    if ($_GET['menu'] == 'cliente') {
        include_once("../Vista/ModuloAdmin/cliente.php");
    }
    if ($_GET['menu'] == 'empleado') {
        include_once("../Vista/ModuloAdmin/empleado.php");
    }
    if ($_GET['menu'] == 'distribuidor') {
        include_once("../Vista/ModuloAdmin/distribuidor.php");
    }
    if ($_GET['menu'] == 'calcularDistribuidor') {
        include_once("../Vista/ModuloAdmin/calcularDistribuidor.php");
    }
    if ($_GET['menu'] == 'perfil') {
        include_once("../Vista/ModuloAdmin/perfil.php");
    }
} else {
    include_once("../Vista/ModuloAdmin/index.php");
}
?>