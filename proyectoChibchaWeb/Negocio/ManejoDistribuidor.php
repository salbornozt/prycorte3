<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DistribuidorDAO.php';
	

	class ManejoDistribuidor {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarDistribuidor($cod_distribuidor){

            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->consult($cod_distribuidor);
            return $distribuidor;
        }


        public static function consultarCodDistribuidor($nom_distribuidor){

            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->consultarCod($nom_distribuidor);
            return $distribuidor;
        }

        /**
         * Create an distribuidor
         * @param Distribuidor distribuidor to create
         * @return void
         */
        public static function createDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->create($distribuidor);
        }

        /**
         * Modify an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function modifyDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->modify($distribuidor);
        }
        /**
         * Delete an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function deleteDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->delete($distribuidor);
        }

        /**
         * List of distribuidor
         * @return Distribuidor[] List of all the distribuidor in the Data Base
         */
        public  static function getList(){
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->getList();
            return $distribuidor;
        }


        public  static function getActiveList(){
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->getActiveList();
            return $distribuidor;
        }

         /**
         * Delete an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function cambiarEstadoDesactivado($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->cambiarEstadoDesactivado($distribuidor);
        }

         /**
         * Delete an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function cambiarEstadoActivado($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->cambiarEstadoActivado($distribuidor);
        }

         /**
        * Create an administrador
        * @param Empleado administrador to create
        * @return void
        */
        public static function creaDistribuidorxAdmin($distribuidor)
        {
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->creaDistribuidorxAdmin($distribuidor);
        }

         /**
        * Create an administrador
        * @param Empleado administrador to create
        * @return void
        */
        public static function getListActivar()
        {
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->getListActivar();
            return $distribuidor;
           
        }

         /**
        * Create an administrador
        * @param Empleado administrador to create
        * @return void
        */
        public static function getListDesactivar()
        {
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->getListDesactivar();
            return $distribuidor;
           
        }
      

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}