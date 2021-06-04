<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

$sql="SELECT nom_distribuidor
FROM distribuidor;
";
$result=pg_query($conexion,$sql);
?>

<div class="container" data-aos="fade-up">
<div class="row">
<div class="col-lg-12 entries">
<BR>
<BR>
<form method="post" action="ModuloAdmin/comision.php">
<article class="entry">
            <h2 class="entry-title">
            <img src="Anyar/assets/img/logo_tarjetas.png" alt="" class="img-fluid"  width="300" height="200" >
            <a> Generar comisión distribuidor </a>
            </h2>
<BR>

<div class="entry-content">
<div class="col-lg-12">
        <div class="row">
                
                <div class="col-lg-6">
                
                <center>
                <br>
                  <p class="entry-meta"> Selecciona el distribuidor: </p>
                  </center>
                </div>
                <div class="col-lg-3">
                <center>
                <br>
                <p><select name="nombre" class="form-control">

                <?php
                while($mostrar=pg_fetch_row($result)){
               
                 echo '
                    <option>' . $mostrar[0] . '</option>';
                } ?>

                </select> </p>
                <p><br></p>
                  </center>
                </div>
                
                
        </div>
</div>
</div>
<br>
<center>
<button type="submit" class="btn btn-success" name='comisionGenerar'>GENERAR COMISIÓN</button>
</center>
</article>
</form>
<br>


</div>
</div>

</div>


