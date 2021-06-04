<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/PaqueteDAO.php';
	

	class ManejoPaquete {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarPaquete($cod_paquete){

            $paqueteDAO = PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paquete = $paqueteDAO->consult($cod_paquete);
            return $paquete;
        }

        public static function consultarCodPaquete($nom_paquete){

            $paqueteDAO = PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paquete = $paqueteDAO->consultarCodPaquete($nom_paquete);
            return $paquete;
        }

        

        /**
         * Create an package
         * @param Paquete Paquete to create
         * @return void
         */
        public static function createPaquete($paquete){
            $paqueteDAO=PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paqueteDAO->create($paquete);
        }

        /**
         * Modify an paquete
         * @param Paquete Paquete to modify
         * @return void
         */
        public static function modifyPaquete($paquete){
            $paqueteDAO=PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paqueteDAO->modify($paquete);
        }
        /**
         * Delete an paquete
         * @param Paquete Paqute to modify
         * @return void
         */
        public static function deletePaquete($paquete){
            $paqueteDAO=PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paqueteDAO->delete($paquete);
        }

        /**
         * List of paquete
         * @return Paquete[] List of all the paquete in the Data Base
         */
        public  static function getList(){
            $paqueteDAO = PaqueteDAO::getPaqueteDAO(self::$conexionBD);
            $paquete = $paqueteDAO->getList();
            return $paquete;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
