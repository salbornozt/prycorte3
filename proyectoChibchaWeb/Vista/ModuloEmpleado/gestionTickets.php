<?php

session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoTicket::setConexionBD($conexion);
$lista = ManejoTicket::consultarTicketCodigoEmpleadoxCliente($_SESSION['cod_empleado']);
$prueba = ManejoTicket::getList();
//$prueba1 = ManejoTicket::consultarTicket(2);

?>
<div class="container-fluid">
<br>

<div class="container-fluid">
    <h1 class="mt-4">TICKETS</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">TICKETS</li>
    </ol>
    </div>
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <section id="tablas" class="tablas">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Nombre Ticket</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Solución</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Cliente</th>
                            <th>Nombre Ticket</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Solución</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
   

    foreach ($lista as $t) {
    
        echo '  <tr>
                    <td align="center">'.$t->getNom_cliente().'</td>
                    <td align="center">'.$t->getNom_ticket().'</td>
                    <td align="center">'.$t->getDescripción_ticket().'</td>
                    <td align="center">'.$t->getFecha_creacion().'</td>
                    <td align="center">
                    <a href="ModuloEmpleado/SolucionTicket.php?value=1&cod_ticket='.$t->getCod_ticket().'" class="scrollto">✔️</a>
                    <a href="ModuloEmpleado/SolucionTicket.php?value=0&cod_ticket='.$t->getCod_ticket().'" class="scrollto">❌</a>
                    </td> 
                               
                </tr>'
        ;
    }
    ?>
                        
                        
                    </tbody>
                </table>
                </section>
            </div>
        </div>
    </div> 
</div>