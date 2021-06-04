<?php

session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoTicket::setConexionBD($conexion);
$lista = ManejoTicket::consultarTicketCodigoEmpleado(1);
$prueba = ManejoTicket::getList();
//$prueba1 = ManejoTicket::consultarTicket(2);



?>

<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
    <!-- COMIENZAN LOS CARDS DE TICKETS-->
    <?php
   

    foreach ($lista as $t) {
    
        echo '<div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">' . $t->getNom_ticket() . '</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#tablas">'.$t->getFecha_creacion().'</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            '
        ;
    }
    ?>
    </div>
    <!-- FINALIZA LOS CARDS-->
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <!-- FINALIZA Las graficas-->
    
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
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Solución</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Solución</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
   

    foreach ($lista as $t) {
    
        echo '  <tr>
                    
                    <td align="center">'.$t->getNom_ticket().'</td>
                    <td align="center">'.$t->getDescripción_ticket().'</td>
                    <td align="center">'.$t->getFecha_creacion().'</td>
                    <td align="center"><a href="SolucionTicket.php?value=1&cod_ticket='.$t->getCod_ticket().'" class="scrollto">✔️</a><b href="SolucionTicket.php?value=0&cod_ticket='.$t->getCod_ticket().'" class="scrollto">❌</b></td> 
                               
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