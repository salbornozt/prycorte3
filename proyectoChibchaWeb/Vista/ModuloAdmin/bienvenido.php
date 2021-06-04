<?php
session_start();

if($_SESSION['nom_administrador']==null)
{
    header("Location: ../Vista/index.php");
}

$nom = $_SESSION['nom_administrador'];
?>



<div class="card-body">
        <div id="tabladatatable">

             <br><br><br><br><br><br><br><br><center><h1>Bienvenido, <?php echo $nom ?>.</h1></center><br><br><br><br><br><br><br><br><br>
                
        </div>
</div>
      