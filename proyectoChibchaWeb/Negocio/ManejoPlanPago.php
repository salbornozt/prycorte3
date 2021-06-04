<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/PlanPagoDAO.php';
	

	class ManejoPLanPago {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarPlanPago($cod_planPago){

            $planPagoDAO = PlanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPago = $planPagoDAO->consult($cod_planPago);
            return $planPago;
        }

        public static function consultarNomPlanPago($nom_planPago){

            $planPagoDAO = PlanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPago = $planPagoDAO->consultarCod($nom_planPago);
            return $planPago;
        }
        /**
         * Create an planPago
         * @param PlanPago PLanPago to create
         * @return void
         */
        public static function createPlanPago($planPago){
            $planPagoDAO=PLanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPagoDAO->create($planPago);
        }

        /**
         * Modify an planPago
         * @param Article PlanPago to modify
         * @return void
         */
        public static function modifyPlanPago($planPago){
            $planPagoDAO=PLanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPagoDAO->modify($planPago);
        }
        /**
         * Delete an planPago
         * @param PlanPago PlanPago to modify
         * @return void
         */
        public static function deletePlanPago($planPago){
            $planPagoDAO=PLanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPagoDAO->delete($planPago);
        }

        /**
         * List of Article
         * @return Article[] List of all the articles in the Data Base
         */
        public  static function getList(){
            $planPagoDAO = PlanPagoDAO::getPlanPagoDAO(self::$conexionBD);
            $planPago = $planPagoDAO->getList();
            return $planPago;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
