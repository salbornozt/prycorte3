<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoSitioWeb.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente::setConexionBD($conexion);
ManejoSitioWeb::setConexionBD($conexion);


$codigoUsuario = $_GET['cod_cliente'];
$clientexsitio = ManejoSitioWeb::consultarSitioWebPorCliente($codigoUsuario);

$nombrePaginaWeb = $_POST['nombrePaginaWeb'];
$descripcion = $_POST['descripcion'];


$clientexsitio->setNombre_pagina_web($nombrePaginaWeb);
$clientexsitio->setDescripcion($descripcion);


ManejoSitioWeb::modifyWebsitexCliente($clientexsitio);

echo '<script>
alert("Tus sitio webs se han modificado")
window.location="../User.php?menu=perfil";
</script>';
