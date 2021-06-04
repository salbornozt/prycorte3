<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/CategoriaDistribuidorDAO.php';
	

	class ManejoCategoriaDistribuidor{
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarCategoriaDistribuidor($cod_categoria_distribuidor){

            $categoriaDistribuidorDAO = CategoriaDistribuidorDAO::getCategoriaDistribuidorDAO(self::$conexionBD);
            $categoriaDistribuidor = $categoriaDistribuidorDAO->consult($cod_categoria_distribuidor);
            return $categoriaDistribuidor;
        }

        /**
         * Create an categoria distribuidor
         * @param CategoriaDistribuidor categoria distribuidor to create
         * @return void
         */
        public static function createCategoriaDistribuidor($categoriaDistribuidor){
            $CategoriaDistribuidorDAO=CategoriaDistribuidorDAO::getCategoriaDistribuidorDAO(self::$conexionBD);
            $categoriaDistribuidorDAO->create($categoriaDistribuidor);
        }

        /**
         * Modify an categoria distribuidor
         * @param CategoriaDistribuidor categoria distribuidor to modify
         * @return void
         */
        public static function modifyCategoriaDistribuidor($categoriaDistribuidor){
            $categoriaDistribuidorDAO=CategoriaDistribuidorDAO::getCategoriaDistribuidorDAO(self::$conexionBD);
            $CategoriaDistribuidorDAO->modify($categoriaDistribuidor);
        }
        /**
         * Delete an categoria distribuidor
         * @param CategoriaDistribuidor categoria distribuidor to modify
         * @return void
         */
        public static function deleteCategoriaDistribuidor($categoriaDistribuidor){
            $categoriaDistribuidorDAO=CategoriaDistribuidorDAO::getCategoriaDistribuidorDAO(self::$conexionBD);
            $categoriaDistribuidorDAO->delete($categoriaDistribuidor);
        }

        /**
         * List of categoria distribuidor
         * @return CategoriaDistribuidor[] List of all the categoria distribuidor in the Data Base
         */
        public  static function getList(){
            $categoriaDistribuidorDAO = CategoriaDistribuidorDAO::getCategoriaDistribuidorDAO(self::$conexionBD);
            $categoriaDistribuidor = $categoriaDistribuidorDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}