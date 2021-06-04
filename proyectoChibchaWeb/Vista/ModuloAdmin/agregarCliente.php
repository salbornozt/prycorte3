<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente::setConexionBD($conexion);

if (isset($_POST['addAgregarCliente']) == true) {

	$nombreCompleto = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
	$nroIdentificacion = isset($_POST['cedula']) ? $_POST['cedula'] : null;
	$email = isset($_POST['correo']) ? $_POST['correo'] : null;
	$contrasena = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;
	
	$usuario = new Cliente();
	
	$usuario->setNom_cliente($nombreCompleto);
	$usuario->setTelefono_cliente($telefono);
	$usuario->setCedula_cliente($nroIdentificacion);
	$usuario->setCorreo_cliente($email);
	$usuario->setContraseña_cliente($contrasena);
	$usuario->setCod_peticion(2);
	$usuario->setCod_usuario(3);

	ManejoCliente::createCliente($usuario);
}
echo '<script>
    alert("Se creo el cliente '.$nombreCompleto.'");
    window.location="../Admin.php?menu=cliente";        
    
    </script>';
