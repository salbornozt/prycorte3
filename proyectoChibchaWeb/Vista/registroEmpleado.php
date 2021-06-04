<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);




/*if ($nombreCompleto != null or $telefono != null or $email != null or $nroIdentificacion != null or $contrasenia != null or $confirmarpass != null) {
	if (preg_match("/\w+@\w+\.+[a-z]/", $email)) {

		$temp = ManejoCliente::consultarCliente($email);
		if ($temp->getCod_usuario() == null) {
			$usuario = new Cliente();
			$usuario->setCod_cliente(1);
			$usuario->setNom_cliente($nombreCompleto);
			$usuario->setTelefono_cliente($telefono);
			$usuario->setCedula_cliente($nroIdentificacion);
			$usuario->setCorreo_cliente($email);
			$usuario->setContraseña_cliente($confirmarpass);
			$usuario->setCod_peticion(1);
			$usuario->setCod_usuario(3);
			ManejoCliente::createCliente($usuario);
			echo "1";
		}
	}
}*/

if (isset($_POST['addRegistroEmpleado']) == true) {

	$nombreCompleto = isset($_POST['nombreCompleto']) ? $_POST['nombreCompleto'] : null;
	$firstname = isset($_POST['FirstName']) ? $_POST['FirstName'] : null;
	$lastname = isset($_POST['LastName']) ? $_POST['LastName'] : null;
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
	$nroIdentificacion = isset($_POST['numeroDeIdentificacion']) ? $_POST['numeroDeIdentificacion'] : null;
	$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$contrasenia = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
	$confirmarpass = isset($_POST['confirmaContrasena']) ? $_POST['confirmaContrasena'] : null;


	$empleado = new Empleado();
	$empleado->setNom_empleado($firstname . ' ' . $lastname);
	$empleado->setCedula_empleado($nroIdentificacion);
	$empleado->setCorreo_empleado($email);
	$empleado->getCargo_empleado($cargo);
	$empleado->setContraseña_empleado($confirmarpass);
	$empleado->setCantidad_tickets(0);
	$empleado->setNivel_empleado(1);
	$empleado->setCod_peticion(2);
	$empleado->setCod_usuario(2);
	ManejoEmpleado::createEmpleadoPorLogin($empleado);
}
echo '<script>
    alert("Ya estás creado la cuenta");
    window.location="login.php";        
    
    </script>';
