<?php

/*require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Comision.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the Paquete entity
 */
class ComisionDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var comisionDAO
     */
    private static $comisionDAO;

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
     * @param int $cod_comision
     * @return Comision
     */
    public function consult($cod_comision)
    {

        $sql = "SELECT * FROM COMISION WHERE cod_comision= " . $cod_comision;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $comision = new Comision();

        $comision->setCod_comision($row[0]);
        $comision->setNum_dominios($row[1]);
        $comision->setValor_pago($row[2]);

        return $comision;
    }

    /**
     * Method to create a new comision
     *
     * @param Comision $comision
     * @return void
     */
    public function create($comision)
    {

        $sql = "insert into COMISION values (" . $comision->getCod_comision() . ",
                                            " . $dominio->getNum_dominios() . ",
                                            " . $dominio->getValor_pago() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an comision entered by parameter
     *
     * @param Comision $comision
     * @return void
     */
    public function modify($comision)
    {

        $sql = "UPDATE COMISION SET cod_comision= " . $comision->getCod_comision() . ",
                                   num_dominios = " . $comision->getNum_dominios() . ",
                                   valor_pago = " . $comision->getValor_pago() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new comision
     *
     * @param Comision $comision
     * @return void
     */

    public function delete($cod_comision)
    {
        $sql = "DELETE FROM COMISION WHERE cod_comision = " . $cod_comision;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an ComisionDAO object
     *
     * @param Object $conexion
     * @return ComisionDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM COMISION";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $paquete = array();

        while ($row = pg_fetch_array($resultado)) {

            $comision->setCod_comision($row[0]);
            $comision->setNum_dominios($row[1]);
            $comision->setValor_pago($row[2]);
           

            $comision[] = $comision;
        }
        return $comision;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public static function getComisionDAO($conexion)
    {
        if (self::$comisionDAO == null) {
            self::$comisionDAO = new ComisionDAO($conexion);
        }

        return self::$comisionDAO;
    }
}
