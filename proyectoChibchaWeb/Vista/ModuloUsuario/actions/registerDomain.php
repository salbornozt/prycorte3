<?php

session_start();
if($_SESSION['cod_cliente']==null)
{
    header("Location: ../index.php");
}
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Dominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDominio.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoDominio::setConexionBD($conexion);

$cod_distribuidor = "{$_SESSION['distri']}";
$cod_cliente = "{$_SESSION['cod_cliente']}";
$dominio = ManejoDominio::consultarDominio($cod_cliente);

$cod_sitio_web = $_POST['cod_sitio_web'];
$cod_paquete = $_POST['cod_paquete'];
$cod_planpago = $_POST['cod_planpago'];
$url = $_POST['url'];
$cod_distribuidor = $_POST['cod_distribuidor'];



//$dominio = new Dominio();

//$dominio->setCod_dominio(0);
$dominio->setCod_sitio_web($cod_sitio_web);
$dominio->setCod_paquete($cod_paquete);
$dominio->setCod_planPago($cod_planpago);
$dominio->setUrl($url);
$dominio->setFecha_creacion(date("Y") . "-" . date("m") . "-" . date("d"));
$dominio->setCod_distribuidor($cod_distribuidor);

ManejoDominio::createDominio($dominio);

echo '<script>
alert("Dominio creado")
window.location="../../User.php";
</script>';



?>