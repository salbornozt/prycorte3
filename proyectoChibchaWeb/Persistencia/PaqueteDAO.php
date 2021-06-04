<?php

/**require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Paquete.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the Paquete entity
 */
class PaqueteDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var paqueteDAO
     */
    private static $paqueteDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion = $conexion;
    }

    /**
     * Method to query an user by his code type
     *
     * @param int $cod_paquete
     * @return Paquete
     */
    public function consult($cod_paquete)
    {

        $sql = "SELECT * FROM PAQUETE WHERE cod_paquete = " . $cod_paquete;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $paquete = new Paquete();

        $paquete->setCod_paquete($row[0]);
        $paquete->setNom_paquete($row[1]);
        $paquete->setDescripcion_paquete($row[2]);
        $paquete->setValor_paquete($row[3]);




        return $paquete;
    }


    public function consultarCodPaquete($nom_paquete)
    {

        $sql = "SELECT * FROM PAQUETE WHERE nom_paquete = '" . $nom_paquete."'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $paquete = new Paquete();

        $paquete->setCod_paquete($row[0]);
        $paquete->setNom_paquete($row[1]);
        $paquete->setDescripcion_paquete($row[2]);
        $paquete->setValor_paquete($row[3]);

        return $paquete;
    }

    /**
     * Method to create a new paquete
     *
     * @param Paquete $paquete
     * @return void
     */
    public function create($paquete)
    {

        $sql = "insert into PAQUETE values (" . $paquete->getCod_paquete() . ",
                                            '" . $paquete->getNom_paquete() . "',
                                            '" . $paquete->getDescripcion_paquete() . "',
                                            " . $paquete->getValor_paquete() . "                                           
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an paquete entered by parameter
     *
     * @param Paquete $paquete
     * @return void
     */
    public function modify($paquete)
    {

        $sql = "UPDATE PAQUETE SET cod_paquete = " . $paquete->getCod_paquete() . ",
                                   nom_paquete = '" . $paquete->getNom_paquete() . "',
                                   descripcion_paquete = '" . $paquete->getDescripcion_paquete() . "',
                                   valor_paquete = " . $paquete->getValor_paquete() . "    
                                   where cod_paquete = " . $paquete->getCod_paquete() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new paquete
     *
     * @param Paquete $paquete
     * @return void
     */

    public function delete($cod_paquete)
    {
        $sql = "DELETE FROM PAQUETE WHERE cod_paquete = " . $cod_paquete;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an PaqueteDAO object
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM PAQUETE";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $paquetes = array();

        
            while ($row = pg_fetch_array($resultado)) {
            $paquete = new Paquete();
            $paquete->setCod_paquete($row[0]);
            $paquete->setNom_paquete($row[1]);
            $paquete->setDescripcion_paquete($row[2]);
            $paquete->setValor_paquete($row[3]);

            array_push($paquetes, $paquete);
        }
        return $paquetes;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public static function getPaqueteDAO($conexion)
    {
        if (self::$paqueteDAO == null) {
            self::$paqueteDAO = new PaqueteDAO($conexion);
        }

        return self::$paqueteDAO;
    }
}
