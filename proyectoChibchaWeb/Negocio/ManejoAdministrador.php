<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/AdministradorDAO.php';
	

	class ManejoAdministrador{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarAdministrador($cod_administrador){

            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administrador = $administradorDAO->consult($cod_administrador);
            return $administrador;
        }

        public static function verificarCuentaAdministrador($correo,$pass){

            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administrador = $administradorDAO->verificarCuenta($correo,$pass);
            return $administrador;
        }

        /**
         * Create an administrador
         * @param Administrador administrador to create
         * @return void
         */
        public static function createAdministrador($administrador){
            $AdministradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $AdministradorDAO->create($administrador);
        }

        /**
         * Modify an categoria distribuidor
         * @param Administrador categoria distribuidor to modify
         * @return void
         */
        public static function modifyAdministrador($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->modify($administrador);
        }
        /**
         * Delete an categoria distribuidor
         * @param Administrador categoria distribuidor to modify
         * @return void
         */
        public static function deleteAdministrador($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->delete($administrador);
        }

        /**
         * List of categoria distribuidor
         * @return Administrador[] List of all the categoria distribuidor in the Data Base
         */
        public static function getList(){
            $administradorDAO = AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administrador = $administradorDAO->getList();
        }

         /**
         * Modify an categoria distribuidor
         * @param Administrador categoria distribuidor to modify
         * @return void
         */
        public static function modificarAd($administrador){
            $administradorDAO=AdministradorDAO::getAdministradorDAO(self::$conexionBD);
            $administradorDAO->modificarAd($administrador);
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}