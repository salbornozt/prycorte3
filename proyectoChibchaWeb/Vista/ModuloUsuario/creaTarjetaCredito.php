<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/TarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/TarjetaCredito.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTarjetaCredito.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoTarjetaCredito::setConexionBD($conexion);


$codigoUsuario = $_GET['cod_cliente'];
$clientextarjeta = ManejoTarjetaCredito::consultarTarjetaCreditoPorCliente($codigoUsuario);

$numeroTarjeta = $_POST['numeroTarjeta'];
$cod_seguridad = $_POST['cod_seguridad'];
$direccion = $_POST['direccion'];
$fechaExpiracion = $_POST['fechaExpiracion'];
$marca = $_POST['marca'];


$clientextarjeta->setNumero_tarjeta($numeroTarjeta);
$clientextarjeta->setCodigo_seguridad($cod_seguridad);
$clientextarjeta->setDireccion($direccion);
$clientextarjeta->setCod_tipo_tarjeta($marca);
$clientextarjeta->setFecha_expiracion($fechaExpiracion);
$clientextarjeta->setCod_cliente($codigoUsuario);

//$tarjetaxtipo = ManejoTipo_tarjeta::consultarTipo_tarjeta($clientextarjeta->getCod_tarjeta_credito());


ManejoTarjetaCredito::createTarjetaCreditoxCliente($clientextarjeta);

echo '<script>
alert("Tus tarjetas de credito se han creado")
window.location="../User.php?menu=perfil";
</script>';
