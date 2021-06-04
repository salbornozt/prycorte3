<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoAdministrador.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoAdministrador::setConexionBD($conexion);

if (isset($_POST['actualizarAdmin']) == true) {

	$nombreCompleto = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$email = isset($_POST['correo']) ? $_POST['correo'] : null;
	$contrasena = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;
	
	$usuario = new Administrador();
	
	$usuario->setNom_administrador($nombreCompleto);
	$usuario->setUsuario_administrador($email);
	$usuario->setContraseña_administrador($contrasena);
	
	ManejoAdministrador::modificarAd($usuario);
}
echo '<script>
    alert("Se actualizo el administrador '.$nombreCompleto.'");
    window.location="../Admin.php?menu=perfil";        
    
    </script>';
