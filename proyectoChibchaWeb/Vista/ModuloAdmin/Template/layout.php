<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

$sql0=" SELECT count(*) FROM empleado";
$result0=pg_query($conexion,$sql0);


$sql01=" SELECT count(*) FROM cliente";
$result01=pg_query($conexion,$sql01);


$sql02=" SELECT count(*) FROM distribuidor";
$result02=pg_query($conexion,$sql02);


$sql03=" SELECT count(*) FROM dominio";
$result03=pg_query($conexion,$sql03);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - ChibchaWeb Admin</title>
        <link href="admin/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <?php
                require_once('header.php');
                ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <?php
                     require_once('left_panel.php');
                    ?>
                    </div>
                    <!--<div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>-->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <?php
                     require_once('routing.php');
                    ?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> &copy; Innosoft</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="admin/dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="admin/dist/assets/demo/chart-area-demo.js"></script>
        <script src="admin/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="admin/dist/assets/demo/datatables-demo.js"></script>
        <script src="admin/dist/assets/demo/chart-pie-demo.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
    var jan =  <?php 
                    while ($mostrar=pg_fetch_row($result0)){
                        echo $mostrar[0];
                    } 
                ?>;
      var feb = <?php 
                    while ($mostrar=pg_fetch_row($result01)){
                        echo $mostrar[0];
                    } 
                ?>;
      var mar = <?php 
                    while ($mostrar=pg_fetch_row($result02)){
                        echo $mostrar[0];
                    } 
                ?>;
      var apr = <?php 
                    while ($mostrar=pg_fetch_row($result03)){
                        echo $mostrar[0];
                    } 
                ?>;
      /*
      var may = 30;
      var jun = 54;
      var jul = 34;
      var aug = 0;
      var sep = 32;
      var oct = 43;
      var nov = 0;
      var dec = 0;
      */
      m = new Chart(document.getElementById("chartjs-line"), {
        type: "bar",
        data: {
            labels: ["Empleados", "Clientes", "Distribuidores", "Dominios"],
            datasets: [{
                label: "Entradas",
                fill: true,
                backgroundColor: "rgba(246, 142, 6, 0.904)",
                borderColor: "rgba(246, 142, 6, 0.904)",
                borderDash: [4, 4],
                data: [jan, feb, mar, apr]
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false
            },
            hover: {
                intersect: true
            },
            plugins: {
                filler: {
                    propagate: false
                }
            },
            scales: {
                xAxes: [{
                    reverse: true,
                    gridLines: {
                        color: "rgba(0,0,0,0.05)"
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 500
                    },
                    display: true,
                    borderDash: [5, 5],
                    gridLines: {
                        color: "rgba(0,0,0,0)",
                        fontColor: "#fff"
                    }
                }]
            }
        }
    });

});


        </script>

    </body>


</html>
