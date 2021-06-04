<?php
class Conexion
{
   public function conectarDB()
   {
      $user =  "postgres";
      $password = "12345678";
      $conexion = pg_connect("host=proyectochibchaweb.cxiitfntvisw.us-east-2.rds.amazonaws.com port=5432 dbname=ProyectoChibchaWeb user=$user password=$password");
      return $conexion;
   }
   public function cerrarDB($conexion)
   {
      $cerrar = pg_close($conexion);
      return $cerrar;
   }
}
?>