<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();


if (isset($_POST['comisionGenerar']) == true) {

	$nombreCompleto = isset($_POST['nombre']) ? $_POST['nombre'] : null;
}

$sql="  SELECT cod_distribuidor
        FROM distribuidor
        WHERE nom_distribuidor = '$nombreCompleto';";
$result=pg_query($conexion,$sql);

while($mostrar=pg_fetch_row($result)){
               
    $admin=$mostrar[0] ;
   }
    

?>

<?php 
                    $sql0="                         
                    SELECT cod_paquete,distribuidor.cod_categoria_distribuidor
                    FROM dominio,distribuidor,categoria_distribuidor
                    WHERE dominio.cod_distribuidor=distribuidor.cod_distribuidor and
                         distribuidor.cod_categoria_distribuidor = categoria_distribuidor.cod_categoria_distribuidor and
                         distribuidor.cod_distribuidor = $admin;";
                    $result0=pg_query($conexion,$sql0);
    


                    $PremiumValorAnual=0;
                    $PremiunValorMensual=0;
                    $BasicoValorMensual=0;
                    $BasicoValorAnual=0;
                    $myhashmap = array();
                
                    while ($mostrar=pg_fetch_row($result0)){
                       
                         
                        $sql1=" SELECT dominio.cod_paquete, valor_paquete
                        FROM dominio,paquete
                        WHERE dominio.cod_paquete = paquete.cod_paquete and
                        paquete.cod_paquete = $mostrar[0];";

                        $result01=pg_query($conexion,$sql1);
                        
                        while($mostrar1=pg_fetch_row($result01)){
                        if($mostrar[1]==2){    
                        if($mostrar1[0]==1 ){
                          
                                $PremiunValorMensual=$PremiunValorMensual+$mostrar1[1];
                        }
                        if( $mostrar1[0]==2 ){
                           
                                 $PremiunValorMensual=$PremiunValorMensual+$mostrar1[1];
                         }
                         if( $mostrar1[0]==3){
                           
                                 $PremiunValorMensual=$PremiunValorMensual+$mostrar1[1];
                         }

                        if($mostrar1[0]==4){
                               // echo "valor paquete anual ".$mostrar1[1];
                               $PremiumValorAnual=$PremiumValorAnual+$mostrar1[1];
                        }
                        if( $mostrar1[0]==5 ){
                            // echo "valor paquete anual ".$mostrar1[1];
                            $PremiumValorAnual=$PremiumValorAnual+$mostrar1[1];
                        }
                        if( $mostrar1[0]==6){
                            // echo "valor paquete anual ".$mostrar1[1];
                            $PremiumValorAnual=$PremiumValorAnual+$mostrar1[1];
                        }  
                        }else if($mostrar[1]==1){
                            if($mostrar1[0]==1 ){
                              
                                     $BasicoValorMensual=$BasicoValorMensual+$mostrar1[1];
                             }
                             if( $mostrar1[0]==2 ){
                               
                                      $BasicoValorMensual=$BasicoValorMensual+$mostrar1[1];
                              }
                              if( $mostrar1[0]==3){
                                
                                      $BasicoValorMensual=$BasicoValorMensual+$mostrar1[1];
                              }
     
                             if($mostrar1[0]==4){
                                    // echo "valor paquete anual ".$mostrar1[1];
                                    $BasicoValorAnual=$BasicoValorAnual+$mostrar1[1];
                             }
                             if( $mostrar1[0]==5 ){
                                 // echo "valor paquete anual ".$mostrar1[1];
                                 $BasicoValorAnual=$BasicoValorAnual+$mostrar1[1];
                             }
                             if( $mostrar1[0]==6){
                                 // echo "valor paquete anual ".$mostrar1[1];
                                 $BasicoValorAnual=$BasicoValorAnual+$mostrar1[1];
                             }  

                        }       
                        }
            
                        
                    } 

                    $sql5="  SELECT *
                            FROM distribuidor
                            where  cod_distribuidor = $admin; 
                           ";
                            $result5=pg_query($conexion,$sql5);

                            while($mostrar5=pg_fetch_row($result5)){
                                if($mostrar5[3]==1){
                                    $xml = new XMLWriter();
                                    $xml->openMemory();
                                    $xml->setIndent(true);
                                    $xml->setIndentString('	'); 
                                    $xml->startDocument('1.0', 'UTF-8');
                                     
                                    $xml->startElement("ComisionDistribuidor"); //inicio  
                                        $xml->writeAttribute('comision', 'distribuidor');                              
                                          $xml->startElement("Distribuidor"); //elemento profesores
                                             $xml->writeElement("Codigo", "$mostrar5[0]");
                                             $xml->writeElement("Nombre", "$mostrar5[1]");
                                             $xml->writeElement("Correo", "$mostrar5[2]"); 
                                             $xml->writeElement("Categoria", "BASICO");          
                                          $xml->endElement(); //fin elemento profesores
                                    
                                            $xml->startElement("Cobro"); //elemento profesores
                                                $xml->writeElement("Anual", "$BasicoValorAnual");
                                                $xml->writeElement("Mensual", "$BasicoValorMensual");             
                                            $xml->endElement(); //fin elemento profesores
                                    $xml->endElement(); //fin 
                                          
                                    $content = $xml->outputMemory();
                                    ob_end_clean();
                                    ob_start();
                                    header('Content-Type: application/xml; charset=UTF-8');
                                    header('Content-Encoding: UTF-8');
                                    header("Content-Disposition: attachment;filename=comision(".$nombreCompleto.").xml");
                                    header('Expires: 0');
                                    header('Pragma: cache');
                                    header('Cache-Control: private');
                                    echo $content;
                                    
                            }else if($mostrar5[3]==2){
$xml = new XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->setIndentString('	'); 
$xml->startDocument('1.0', 'UTF-8');
 
$xml->startElement("ComisionDistribuidor"); //inicio  
    $xml->writeAttribute('comision', 'distribuidor');                              
      $xml->startElement("Distribuidor"); //elemento profesores
         $xml->writeElement("Codigo", "$mostrar5[0]");
         $xml->writeElement("Nombre", "$mostrar5[1]");
         $xml->writeElement("Correo", "$mostrar5[2]"); 
         $xml->writeElement("Categoria", "PREMIUM");          
      $xml->endElement(); //fin elemento profesores

        $xml->startElement("Cobro"); //elemento profesores
            $xml->writeElement("Anual", "$PremiumValorAnual");
            $xml->writeElement("Mensual", "$PremiunValorMensual");             
        $xml->endElement(); //fin elemento profesores
$xml->endElement(); //fin 
      
$content = $xml->outputMemory();
ob_end_clean();
ob_start();
header('Content-Type: application/xml; charset=UTF-8');
header('Content-Encoding: UTF-8');
header("Content-Disposition: attachment;filename=comision(".$nombreCompleto.").xml");
header('Expires: 0');
header('Pragma: cache');
header('Cache-Control: private');
echo $content;
                                  
                                }
                           
                            }
?>            

