<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/ComisionDAO.php';
	

	class ManejoComision {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarComision($cod_comision){

            $comisionDAO = ComisionDAO::getComisionDAO(self::$conexionBD);
            $comision = $comisionDAO->consult($cod_comision);
            return $comision;
        }

        /**
         * Create an comision
         * @param Comision comision to create
         * @return void
         */
        public static function createComision($comision){
            $comisionDAO=ComisionDAO::getComisionDAO(self::$conexionBD);
            $comisionDAO->create($comision);
        }

        /**
         * Modify an comision
         * @param Comision comision to modify
         * @return void
         */
        public static function modifyComision($comision){
            $comisionDAO=ComisionDAO::getComisionDAO(self::$conexionBD);
            $comisionDAO->modify($comision);
        }
        /**
         * Delete an comision
         * @param Comision comision to modify
         * @return void
         */
        public static function deleteComision($comision){
            $comisionDAO=ComisionDAO::getComisionDAO(self::$conexionBD);
            $comisionDAO->delete($comision);
        }

        /**
         * List of comision
         * @return Comision[] List of all the dominio in the Data Base
         */
        public  static function getList(){
            $comisionDAO = ComisionDAO::getComisionDAO(self::$conexionBD);
            $comision = $comisionDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
