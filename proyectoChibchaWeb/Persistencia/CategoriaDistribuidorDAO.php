<?php

/*require_once ("/home/u999386215/public_html/proyectoLibreria/Negocio/Article.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/Util/Conexion.php");
require_once ("/home/u999386215/public_html/proyectoLibreria/Persistencia/DAO.php");*/

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/CategoriaDistribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';

/**
 *Represents the DAO of the Paquete entity
 */
class CategoriaDistribuidorDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an PlanPagoDAO object
     * @var CategoriaDistribuidorDAO
     */
    private static $CategoriaDistribuidorDAO;

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
     * @param int $cod_categoria_distribuidor
     * @return CategoriaDistribuidor
     */
    public function consult($cod_categoria_distribuidor)
    {

        $sql = "SELECT * FROM CATEGORIA_DISTRIBUIDOR WHERE cod_categoria_distribuidor= " . $cod_categoria_distribuidor;

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);

        $CategoriaDistribuidor = new CategoriaDistribuidor();

        $CategoriaDistribuidor->setCod_categoria_distribuidor($row[0]);
        $CategoriaDistribuidor->setNom_categoria($row[1]);
        $CategoriaDistribuidor->setCantidad_dominios($row[2]);
        $CategoriaDistribuidor->setCod_comision($row[3]);

        return $CategoriaDistribuidor;
    }

    /**
     * Method to create a new comision
     *
     * @param CategoriaDistribuidor $CategoriaDistribuidor
     * @return void
     */
    public function create($CategoriaDistribuidor)
    {

        $sql = "insert into categoria_distribuidor values (" . $CategoriaDistribuidor->getCod_categoria_distribuidor() . ",
                                            '" . $CategoriaDistribuidor->getNom_categoria() . "',
                                            '" . $CategoriaDistribuidor->getCantidad_dominios() . "',
                                            " . $CategoriaDistribuidor->getCod_comision() . "
                                        );";

        mysqli_query($this->conexion, $sql);
    }

    /**
     * Method that modifies an CategoriaDistribuidor entered by parameter
     *
     * @param CategoriaDistribuidor $CategoriaDistribuidor
     * @return void
     */
    public function modify($CategoriaDistribuidor)
    {

        $sql = "UPDATE categoria_distribuidor SET cod_categoria_distribuidor= " . $CategoriaDistribuidor->getCod_categoria_distribuidor() . ",
                                    nom_categoria = '" . $CategoriaDistribuidor->getNom_categoria() . "',
                                    cantidad_dominios = '" . $CategoriaDistribuidor->getCantidad_dominios() . "',
                                    cod_comision = " . $CategoriaDistribuidor->getCod_comision() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new CategoriaDistribuidor
     *
     * @param CategoriaDistribuidor $CategoriaDistribuidor
     * @return void
     */

    public function delete($cod_categoria_distribuidor)
    {
        $sql = "DELETE FROM categoria_distribuidor WHERE cod_categoria_distribuidor = " . $cod_categoria_distribuidor;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an CategoriaDistribuidorDAO object
     *
     * @param Object $conexion
     * @return CategoriaDistribuidorDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM categoria_distribuidor";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $paquete = array();

        while ($row = pg_fetch_array($resultado)) {

            $CategoriaDistribuidor->setCod_categoria_distribuidor($row[0]);
            $CategoriaDistribuidor->setNom_categoria($row[1]);
            $CategoriaDistribuidor->setCantidad_dominios($row[2]);
            $CategoriaDistribuidor->setCod_comision($row[3]);

            $CategoriaDistribuidor[] = $CategoriaDistribuidor;
        }
        return $CategoriaDistribuidor;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return PaqueteDAO
     */
    public static function getCategoriaDistribuidorDAO($conexion)
    {
        if (self::$CategoriaDistribuidorDAO == null) {
            self::$CategoriaDistribuidorDAO = new CategoriaDistribuidorDAO($conexion);
        }

        return self::$CategoriaDistribuidorDAO;
    }
}