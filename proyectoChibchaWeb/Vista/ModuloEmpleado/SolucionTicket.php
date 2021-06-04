<?php

session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoTicket::setConexionBD($conexion);
$cod_ticket = (int)$_GET["cod_ticket"];


if ($_GET["value"] == 1) {
    $estado = ManejoTicket::modificarEstadoTicket($cod_ticket, $_SESSION['cod_empleado'], $_SESSION['cantidad_de_tickets']);
    echo '<script>
        alert("revisado");
        window.location="../Empleado.php?menu=verTickets";          
    </script>';
} elseif ($_GET["value"] == 0) {
    $nivel = (int)$_SESSION['nivel_empleado'];
    $nivel = $nivel + 1;
    if ($nivel <= 3) {
        ManejoTicket::pasarSiguienteNivel($cod_ticket, $nivel, $_SESSION['cod_empleado'], $_SESSION['cantidad_de_tickets']);

        echo '<script>
        alert("Se asigno a otro usuario");
        window.location="../Empleado.php?menu=verTickets";          
        </script>';
        //header("Location: ../Vista/Empleado.php?menu=verTickets.php");     


    } else {

        echo '<script>
        alert("Imposible darlo a otro empleado, debe solucionarlo");
        window.location="../Empleado.php?menu=verTickets";  
        
        </script>';
        //header("Location: ");
    }

    // hacer que el ticket vaya a otro empleado
} else {
    echo '<script>
        alert("Nuloooooo");
        </script>';
    //header("Location: ../Vista/Empleado.php?menu=verTickets.php");
}
